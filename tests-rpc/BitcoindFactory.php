<?php

namespace RpcTests\Nbobtc;

class BitcoindFactory
{
    const TESTS_DIR = "BITCOIND_TEST_DIR";
    const BITCOIND = "BITCOIND_PATH";

    /**
     * @var array|false|null|string
     */
    private $testsDirPath;

    /**
     * @var array|false|null|string
     */
    private $bitcoindPath;

    /**
     * @var string[]
     */
    private $testDir = [];

    /**
     * @var Bitcoind[]
     */
    private $server = [];

    /**
     * @var Credential
     */
    private $credential;

    /**
     * BitcoindFactory constructor.
     */
    public function __construct()
    {
        $this->testsDirPath = $this->envOrDefault("BITCOIND_TEST_DIR", "/tmp");
        $this->bitcoindPath = $this->envOrDefault("BITCOIND_PATH");
        if (null === $this->bitcoindPath) {
            throw new \RuntimeException("Missing BITCOIND_PATH variable");
        }

        $this->credential = new Credential("127.0.0.1", 18332, "rpcuser", "rpcpass");
    }

    /**
     * @param $var
     * @param null $default
     * @return array|false|null|string
     */
    private function envOrDefault($var, $default = null)
    {
        $value = getenv($var);
        if (in_array($value, [null, false, ""])) {
            $value = $default;
        }
        return $value;
    }

    /**
     * Generates a new datadir for bitcoind, which will be
     * cleaned up after tests finish.
     *
     * @return string
     */
    protected function createRandomTestDir()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randFile = substr(str_shuffle($chars),0, 9);
        $this->testDir[] = $dir = "{$this->testsDirPath}/{$randFile}";
        if (!mkdir($dir)) {
            throw new \RuntimeException("Failed to create test dir!");
        }
        return $dir;
    }

    /**
     * Creates a new regtest bitcoind server
     * @param array $options
     * @return Bitcoind
     */
    public function createServer($options = [])
    {
        $testDir = $this->createRandomTestDir();
        $rpcServer = new Bitcoind($this->bitcoindPath, $testDir, $this->credential, $options);
        $rpcServer->start();
        $this->server[] = $rpcServer;
        return $rpcServer;
    }

    /**
     * Removes any still running bitcoind instances.
     */
    protected function cleanup()
    {
        $servers = 0;
        $dirs = 0;
        foreach ($this->server as $server) {
            if ($server->isRunning()) {
                $servers++;
                $server->destroy();
            }
        }

        echo "Cleaned up {$servers} servers, and {$dirs} directories\n";
    }

    public function __destruct()
    {
        $this->cleanup();
    }
}
