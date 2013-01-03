<?php

namespace Nbobtc\Bitcoind;

use Nbobtc\Bitcoind\Client;

/**
 * @author Joshua Estes
 */
class Bitcoind implements BitcoindInterface
{

    protected $schema;
    protected $user;
    protected $password;
    protected $host;
    protected $port;

    /**
     * @param string $schema
     * @param string $user
     * @param string $password
     * @param string $host
     * @param integer $port
     */
    public function __construct($schema = 'https', $user, $password, $host = '127.0.0.1', $port = 8332)
    {
        $this->schema   = $schema;
        $this->user     = $user;
        $this->password = $password;
        $this->host     = $host;
        $this->port     = $port;
    }

    /**
     * @inheritdoc
     */
    public function help($command = null)
    {
        $response = $this->sendRequest('help', $command);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function addmultisigaddress($nrequired, $keys, $account = null)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function backupWallet($destination)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createmultisig()
    {
    }

    /**
     * @inheritdoc
     */
    public function createrawtransaction()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function decoderawtransaction($hex)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function dumpprivkey($address)
    {
        $response = $this->sendRequest('dumpprivkey', $address);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function encryptWallet($passphrase)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getaccount($address)
    {
        $response = $this->sendRequest('getaccount', $address);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getaccountaddress($account)
    {
        $response = $this->sendRequest('getaccountaddress', (string) $account);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getaddressesbyaccount($account)
    {
        $response = $this->sendRequest('getaddressesbyaccount', $account);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getbalance($account = null, $minconf = 1)
    {
        $response = $this->sendRequest('getbalance', array((string) $account, (integer) $minconf));

        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblock($hash)
    {
        $response = $this->sendRequest('getblock', $hash);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblockcount()
    {
        $response = $this->sendRequest('getblockcount');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblockhash($index)
    {
        $response = $this->sendRequest('getblockhash', $index);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblocktemplate()
    {
    }

    /**
     * @inheritdoc
     */
    public function getconnectioncount()
    {
        $response = $this->sendRequest('getconnectioncount');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getdifficulty()
    {
        $response = $this->sendRequest('getdifficulty');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getgenerate()
    {
        $response = $this->sendRequest('getgenerate');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gethashespersec()
    {
        $response = $this->sendRequest('gethasespersec');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getinfo()
    {
        $response = $this->sendRequest('getinfo');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getmemorypool($data = null)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * Returns an object containing mining-related information:
     *     -  blocks
     *     -  currentblocksize
     *     -  currentblocktx
     *     -  difficulty
     *     -  errors
     *     -  generate
     *     -  genproclimit
     *     -  hashespersec
     *     -  pooledtx
     *     -  testnet
     *
     * @return array
     */
    public function getmininginfo()
    {
        $response = $this->sendRequest('getmininginfo');
        return $response->result;
    }

    /**
     * Returns a new bitcoin address for receiving payments. If [account] is
     * specified (recommended), it is added to the address book so payments
     * received with the address will be credited to [account].
     *
     * @param string|null $account
     *
     * @return string
     */
    public function getnewaddress($account = null)
    {
        $response = $this->sendRequest('getnewaddress', (string) $account);
        return $response->result;
    }

    /**
     * Returns data about each connected node.
     *
     * <code>
     *    "addr":"216.12.214.106:8333",
     *    "services":"00000001",
     *    "lastsend":1352599543,
     *    "lastrecv":1352600149,
     *    "conntime":1352596420,
     *    "version":60001,
     *    "subver":"/Satoshi:0.6.3/",
     *    "inbound":false,
     *    "releasetime":0,
     *    "startingheight":207409,
     *    "banscore":0
     * </code>
     *
     * @return array
     */
    public function getpeerinfo()
    {
        $response = $this->sendRequest('getpeerinfo');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getrawmempool()
    {
        $response = $this->sendRequest('getrawmempool');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getrawtransaction($txid, $verbose = false)
    {
        $response = $this->sendRequest('getrawtransaction', array($txid, (integer) $verbose));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getreceivedbyaccount($account = null, $minconf = 1)
    {
        $response = $this->sendRequest('getreceivedbyaccount', array((string) $account, $minconf));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getreceivedbyaddress($address = null, $minconf = 1)
    {
        $response = $this->sendRequest('getreceivedbyaddress', array($bitcoinaddress, $minconf));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gettransaction($txid)
    {
        $response = $this->sendRequest('gettransaction', $txid);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gettxout()
    {
    }

    /**
     * @inheritdoc
     */
    public function gettxoutsetinfo()
    {
    }

    /**
     * @inheritdoc
     */
    public function getwork($data = null)
    {
        $response = $this->sendRequest('getwork', $data);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function importprivkey($privkey, $label = null)
    {
        $response = $this->sendRequest('importprivkey', array($bitcoinprivkey, (string) $label));
        return $response->result;
    }

    /**
     * NOTE: Must run walletPassphrase method before this
     * @return null
     */
    public function keypoolrefill()
    {
        $response = $this->sendRequest('keypoolrefill');
        return $response->result;
    }

    /**
     * Returns an array of accounts and their balances
     *
     * <code>
     * array(
     *     array('account' => 'account name', 'balance' => 0.0000000),
     * )
     * </code>
     *
     * @param integer $minconf Minimum Confirmations
     *
     * @return array
     */
    public function listaccounts($minconf = 1)
    {
        $response = $this->sendRequest('listaccounts', (integer) $minconf);
        $accounts = array();
        foreach ($response->result as $account => $balance) {
            $accounts[] = array(
                'account' => $account,
                'balance' => $balance,
            );
        }
        return $accounts;
    }

    /**
     * @inheritdoc
     */
    public function listaddressgroupings()
    {
    }

    /**
     * @inheritdoc
     */
    public function listlockunspent()
    {
    }

    /**
     * @inheritdoc
     */
    public function listreceivedbyaccount($minconf = 1, $includeempty = false)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function listreceivedbyaddress($minconf = 1, $includeempty = false)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function listsinceblock($hash = null, $minconf = 1)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function listtransactions($account = null, $count = 10, $from = 0)
    {
        $response = $this->sendRequest('listtransactions', array((string) $account, $count, $from));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listunspent($minconf = 1, $maxconf = 999999)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function lockunspent()
    {
    }


    /**
     * @inheritdoc
     */
    public function move($fromaccount, $toaccount, $amount, $minconf = 1, $comment = null, $commentto = null)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function sendfrom($account, $address, $amount, $minconf = 1, $comment = null, $commentto = null)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function sendmany($fromaccount, array $addresses, $minconf = 1, $comment = null)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function sendrawtransaction($hex)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function sendtoaddress($address, $amount, $comment = null, $commentto = null)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function setaccount($address, $account)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function setgenerate($generate, $genproclimit = -1)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function settxfee($amount)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function signmessage($address, $message)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function signrawtransaction($hex, $txinfo, $keys)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function stop()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function submitblock()
    {
    }

    /**
     * @inheritdoc
     */
    public function validateaddress($address)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function verifymessage($address, $signature, $message)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function walletlock()
    {
        $response = $this->sendRequest('walletlock');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function walletpassphrase($passphrase, $timeout)
    {
        $response = $this->sendRequest('walletpassphrase', array($passphrase, $timeout));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function walletpassphrasechange($oldpassphrase, $newpassphrase)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * This will send a request to the RPC server and return the
     * results
     *
     * @param string       $method
     * @param string|array $params
     * @param string       $id
     * @throw Exception
     * @return StdClass
     */
    public function sendRequest($method, $params = null, $id = null)
    {
        if (null === $this->client) {
            $this->client = new Client(sprintf('%s://%s:%s@%s:%s', $this->schema, $this->user, $this->password, $this->host, $this->port));
        }

        return $this->client->execute($method, $params, $id);
    }

}
