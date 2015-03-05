<?php

use Nbobtc\Bitcoind\Bitcoind;
use Nbobtc\Bitcoind\Client;

/**
 * @author Joshua Estes
 */
class BitcoindTest extends \PHPUnit_Framework_TestCase
{

    public function testAddmultisigaddress()
    {
        $this->markTestIncomplete();
    }

    public function testBackupwallet()
    {
        $this->markTestIncomplete();
    }

    public function testCreaterawtransaction()
    {
        $this->markTestIncomplete();
    }

    public function testDecoderawtransaction()
    {
        $this->markTestIncomplete();
    }

    public function testDumpprivkey()
    {
        $this->markTestIncomplete();
    }

    public function testEncrypteallet()
    {
        $this->markTestIncomplete();
    }

    public function testGetaccount()
    {
        $this->markTestIncomplete();
    }

    public function testGetaccountaddress()
    {
        $this->markTestIncomplete();
    }

    public function testGetbalance()
    {
        $this->markTestIncomplete();
    }

    public function testGetblock()
    {
        $this->markTestIncomplete();
    }

    public function testGetblockcount()
    {
        $this->markTestIncomplete();
    }

    public function testGetblockhash()
    {
        $this->markTestIncomplete();
    }

    public function testGetblocktemplate()
    {
        $this->markTestIncomplete();
    }

    public function testGetconnectioncount()
    {
        $this->markTestIncomplete();
    }

    public function testGetdifficulty()
    {
        $this->markTestIncomplete();
    }

    public function testGetgenerate()
    {
        $this->markTestIncomplete();
    }

    public function testGethashespersec()
    {
        $this->markTestIncomplete();
    }

    public function testGetinfo()
    {
        $response = (object) array(
            'error' => null,
            'id' => null,
            'result' => (object) array('balance' => 0.0000),
        );
        $mock = $this->getMock('Nbobtc\Bitcoind\Client');
        $mock->expects($this->any())
            ->method('execute')
            ->will($this->returnValue($response));

        $bitcoind = new Bitcoind($mock);

        $this->assertInstanceOf('stdClass', $bitcoind->getinfo());
    }

    public function testGetmininginfo()
    {
        $this->markTestIncomplete();
    }

    public function testGetnewaddress()
    {
        $this->markTestIncomplete();
    }

    public function testGetpeerinfo()
    {
        $this->markTestIncomplete();
    }

    public function testGetrawmempool()
    {
        $this->markTestIncomplete();
    }

    public function testGetrawtransaction()
    {
        $this->markTestIncomplete();
    }

    public function testGetreceivedbyaccount()
    {
        $this->markTestIncomplete();
    }

    public function testGetreceivedbyaddress()
    {
        $this->markTestIncomplete();
    }

    public function testGettransaction()
    {
        $this->markTestIncomplete();
    }

    public function testGettxout()
    {
        $this->markTestIncomplete();
    }

    public function testGettxoutsetinfo()
    {
        $this->markTestIncomplete();
    }

    public function testGetwork()
    {
        $this->markTestIncomplete();
    }

    public function testHelp()
    {
        $response = new \stdClass();
        $response->result = "addmultisigaddress <nrequired> <'[\"key\",\"key\"]'> [account]\nbackupwallet <destination>\ncreaterawtransaction [{\"txid\":txid,\"vout\":n},...] {address:amount,...}\ndecoderawtransaction <hex string>\ndumpprivkey <bitcoinaddress>\nencryptwallet <passphrase>\ngetaccount <bitcoinaddress>\ngetaccountaddress <account>\ngetaddressesbyaccount <account>\ngetbalance [account] [minconf=1]\ngetblock <hash>\ngetblockcount\ngetblockhash <index>\ngetblocktemplate [params]\ngetconnectioncount\ngetdifficulty\ngetgenerate\ngethashespersec\ngetinfo\ngetmininginfo\ngetnewaddress [account]\ngetpeerinfo\ngetrawmempool\ngetrawtransaction <txid> [verbose=0]\ngetreceivedbyaccount <account> [minconf=1]\ngetreceivedbyaddress <bitcoinaddress> [minconf=1]\ngettransaction <txid>\ngetwork [data]\nhelp [command]\nimportprivkey <bitcoinprivkey> [label]\nkeypoolrefill\nlistaccounts [minconf=1]\nlistaddressgroupings\nlistreceivedbyaccount [minconf=1] [includeempty=false]\nlistreceivedbyaddress [minconf=1] [includeempty=false]\nlistsinceblock [blockhash] [target-confirmations]\nlisttransactions [account] [count=10] [from=0]\nlistunspent [minconf=1] [maxconf=9999999]  [\"address\",...]\nmove <fromaccount> <toaccount> <amount> [minconf=1] [comment]\nsendfrom <fromaccount> <tobitcoinaddress> <amount> [minconf=1] [comment] [comment-to]\nsendmany <fromaccount> {address:amount,...} [minconf=1] [comment]\nsendrawtransaction <hex string>\nsendtoaddress <bitcoinaddress> <amount> [comment] [comment-to]\nsetaccount <bitcoinaddress> <account>\nsetgenerate <generate> [genproclimit]\nsettxfee <amount>\nsignmessage <bitcoinaddress> <message>\nsignrawtransaction <hex string> [{\"txid\":txid,\"vout\":n,\"scriptPubKey\":hex},...] [<privatekey1>,...] [sighashtype=\"ALL\"]\nstop <detach>\nsubmitblock <hex data> [optional-params-obj]\nvalidateaddress <bitcoinaddress>\nverifymessage <bitcoinaddress> <signature> <message>";
        $response->error = null;
        $response->id = null;

        $mock = $this->getMock('Nbobtc\Bitcoind\Client');
        $mock->expects($this->any())
            ->method('execute')
            ->will($this->returnValue($response));

        $bitcoind = new Bitcoind($mock);

        $this->assertInternalType('string', $bitcoind->help());
        $this->assertEquals($response->result, $bitcoind->help());
    }

    public function testImpoerprivkey()
    {
        $this->markTestIncomplete();
    }

    public function testKeypoolrefill()
    {
        $this->markTestIncomplete();
    }

    public function testListaccounts()
    {
        $response = (object) array(
            'error' => null,
            'id' => null,
            'result' => array(),
        );
        $mock = $this->getMock('Nbobtc\Bitcoind\Client');
        $mock->expects($this->any())
            ->method('execute')
            ->will($this->returnValue($response));

        $bitcoind = new Bitcoind($mock);
        $this->assertInternalType('array', $bitcoind->listaccounts());
    }

    public function testListaddressbygroupings()
    {
        $this->markTestIncomplete();
    }

    public function testListlockunspent()
    {
        $this->markTestIncomplete();
    }

    public function testListreceivedbyaccount()
    {
        $this->markTestIncomplete();
    }

    public function testListreceivedbyaddress()
    {
        $this->markTestIncomplete();
    }

    public function testListsinceblock()
    {
        $this->markTestIncomplete();
    }

    public function testListtransactions()
    {
        $this->markTestIncomplete();
    }

    public function testListunspent()
    {
        $this->markTestIncomplete();
    }

    public function testLockunspent()
    {
        $this->markTestIncomplete();
    }

    public function testMove()
    {
        $this->markTestIncomplete();
    }

    public function testSendfrom()
    {
        $this->markTestIncomplete();
    }

    public function testSendmany()
    {
        $this->markTestIncomplete();
    }

    public function testSendrawtransaction()
    {
        $this->markTestIncomplete();
    }

    public function testSendtoaddress()
    {
        $this->markTestIncomplete();
    }

    public function testSetaccount()
    {
        $this->markTestIncomplete();
    }

    public function testSetgenerate()
    {
        $this->markTestIncomplete();
    }

    public function testSettxfee()
    {
        $this->markTestIncomplete();
    }

    public function testSignmessage()
    {
        $this->markTestIncomplete();
    }

    public function testSignrawtransaction()
    {
        $this->markTestIncomplete();
    }

    public function testStop()
    {
        $this->markTestIncomplete();
    }

    public function testSubmitblock()
    {
        $this->markTestIncomplete();
    }

    public function testValidateaddress()
    {
        $this->markTestIncomplete();
    }

    public function testVerifymessage()
    {
        $this->markTestIncomplete();
    }

    public function testWalletlock()
    {
        $this->markTestIncomplete();
    }

    public function testWalletpassphrase()
    {
        $this->markTestIncomplete();
    }

    public function testWalletpassphrasechange()
    {
        $this->markTestIncomplete();
    }

}
