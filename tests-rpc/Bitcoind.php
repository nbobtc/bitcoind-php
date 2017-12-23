<?php

namespace RpcTests\Nbobtc;

use Nbobtc\Command\Command;
use Nbobtc\Http\Client;

class Bitcoind
{
    const ERROR_STARTUP = -28;
    const ERROR_TX_MEMPOOL_CONFLICT = -26;
    const ERROR_UNKNOWN_COMMAND = -32601;

    /**
     * @var string
     */
    private $dataDir;

    /**
     * @var string
     */
    private $bitcoind;

    /**
     * @var Credential
     */
    private $credential;

    /**
     * @var Client
     */
    private $client;

    private $defaultOptions = [
        "daemon" => 1,
        "server" => 1,
        "regtest" => 1,
    ];

    private $options = [];

    /**
     * RpcServer constructor.
     * @param $bitcoind
     * @param string $dataDir
     * @param Credential $credential
     * @param array $options
     */
    public function __construct($bitcoind, $dataDir, Credential $credential, array $options = [])
    {
        $this->bitcoind = $bitcoind;
        $this->dataDir = $dataDir;
        $this->credential = $credential;
        $this->options = array_merge($options, $this->defaultOptions);
    }

    /**
     * @return string
     */
    private function getPidFile()
    {
        return "{$this->dataDir}/regtest/bitcoind.pid";
    }

    /**
     * @return string
     */
    private function getConfigFile()
    {
        return "{$this->dataDir}/bitcoin.conf";
    }

    /**
     * @param Credential $rpcCredential
     */
    private function writeConfigToFile(Credential $rpcCredential)
    {
        $fd = fopen($this->getConfigFile(), "w");
        if (!$fd) {
            throw new \RuntimeException("Failed to open bitcoin.conf for writing");
        }

        $config = array_merge(
            $this->options,
            $rpcCredential->getConfigArray()
        );

        $iniConfig = implode("\n", array_map(function ($value, $key) {
            return "{$key}={$value}";
        }, $config, array_keys($config)));

        if (!fwrite($fd, $iniConfig)) {
            throw new \RuntimeException("Failed to write to bitcoin.conf");
        }

        fclose($fd);
    }

    /**
     * Start bitcoind and
     * @return void
     */
    public function start()
    {
        if ($this->isRunning()) {
            return;
        }

        $this->writeConfigToFile($this->credential);
        $res = 0;
        $out = '';
        exec(sprintf("%s -datadir=%s", $this->bitcoind, $this->dataDir), $out, $res);

        if ($res !== 0) {
            throw new \RuntimeException("Failed to start bitcoind: {$this->dataDir}\n");
        }

        $start = microtime(true);
        $limit = 10;
        $connected = false;

        $conn = new Client($this->credential->getDsn());

        do {
            try {
                $result = json_decode($conn->sendCommand(new Command("getchaintips"))->getBody()->getContents(), true);
                if ($result['error'] === null) {
                    $connected = true;
                } else {
                    if ($result['error']['code'] !== self::ERROR_STARTUP && $result['error']['code'] !== self::ERROR_UNKNOWN_COMMAND) {
                        throw new \RuntimeException("Unexpected error code during startup: {$result['error']['code']}");
                    }

                    sleep(0.2);
                }

            } catch (\Exception $e) {
                sleep(0.2);
            }

            if (microtime(true) > $start + $limit) {
                throw new \RuntimeException("Timeout elapsed, never made connection to bitcoind");
            }
        } while (!$connected);
    }

    /**
     * Recursive delete of datadir.
     * @param string $src
     */
    private function recursiveDelete($src)
    {
        $dir = opendir($src);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                    $this->recursiveDelete($full);
                }
                else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }

    /**
     * @return void
     */
    public function destroy()
    {
        if ($this->isRunning()) {
            $this->makeClient()->sendCommand(new Command("stop"));

            do {
                sleep(0.2);
            } while($this->isRunning());

            $this->recursiveDelete($this->dataDir);
        }
    }

    /**
     * @return bool
     */
    public function isRunning()
    {
        return file_exists($this->getPidFile());
    }

    /**
     * @return Client
     */
    public function makeClient()
    {
        if (!$this->isRunning()) {
            throw new \RuntimeException("No client, server not running");
        }

        if (null === $this->client) {
            $this->client = new Client($this->credential->getDsn());
        }

        return $this->client;
    }
}
