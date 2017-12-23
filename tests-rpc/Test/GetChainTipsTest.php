<?php

namespace RpcTests\Nbobtc\Test;

use Nbobtc\Command\Command;
use RpcTests\Nbobtc\BitcoindFactory;

class GetChainTipsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BitcoindFactory
     */
    private $rpcFactory;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        static $rpcFactory = null;
        if (null === $rpcFactory) {
            $rpcFactory = new BitcoindFactory();
        }
        $this->rpcFactory = $rpcFactory;
    }

    public function testGetBlockChainInfo()
    {
        $bitcoind = $this->rpcFactory->createServer();
        $this->assertTrue($bitcoind->isRunning());

        $client = $bitcoind->makeClient();
        $response = $client->sendCommand(new Command("getblockchaininfo", []));
        $this->assertEquals(200, $response->getStatusCode());

        $decoded = json_decode($response->getBody()->getContents(), true);
        $this->assertInternalType('array', $decoded);
        $this->assertArrayHasKey('error', $decoded);
        $this->assertNull($decoded['error']);

        $this->assertArrayHasKey('result', $decoded);
        $this->assertInternalType('array', $decoded['result']);

        $bitcoind->destroy();
    }
}
