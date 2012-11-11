<?php

namespace Nbobtc\Bitcoind;

/**
 * @author Joshua Estes
 */
class Bitcoind
{

    protected $schema;
    protected $user;
    protected $password;
    protected $host;
    protected $port;

    /**
     * @param string $user
     * @param string $password
     * @param string $host
     * @param integer $port
     */
    public function __construct($user, $password, $host = '127.0.0.1', $port = 8332)
    {
        $this->schema   = 'http';
        $this->user     = $user;
        $this->password = $password;
        $this->host     = $host;
        $this->port     = $port;
    }

    /**
     * @param string $command
     */
    public function help($command = null)
    {
        $response = $this->sendRequest('help', $command);
        return $response->result;
    }

    public function addmultisigaddress()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string $destination
     */
    public function backupWallet($destination)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function createRawTransaction()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string $hexstring
     */
    public function decodeRawTransaction($hexstring)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string $bitcoinaddress
     */
    public function dumpPrivKey($bitcoinaddress)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function encryptWallet()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string $bitcoinaddress
     */
    public function getAccount($bitcoinaddress)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string $account
     */
    public function getAccountAddress($account)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string $account
     */
    public function getAddressesByAccount($account)
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * @param string  $account
     * @param integer $minconf
     *
     * @return float
     */
    public function getBalance($account = '', $minconf = 1)
    {
        $response = $this->sendRequest('getbalance', array($account, $minconf));
        return $response->result;
    }

    /**
     * @param string $hash
     */
    public function getBlock($hash)
    {
        $response = $this->sendRequest('getblock', $hash);
        return $response->result;
    }

    /**
     * Returns the number of blocks in the longest block chain.
     *
     * @return integer
     */
    public function getBlockCount()
    {
        $response = $this->sendRequest('getblockcount');
        return $response->result;
    }

    /**
     */
    public function getBlockHash()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    /**
     * Returns the number of connections to other nodes.
     *
     * @return integer
     */
    public function getConnectionCount()
    {
        $response = $this->sendRequest('getconnectioncount');
        return $response->result;
    }

    /**
     * Returns the proof-of-work difficulty as a multiple of the minimum difficulty.
     *
     * @return float
     */
    public function getDifficulty()
    {
        $response = $this->sendRequest('getdifficulty');
        return $response->result;
    }

    /**
     * Returns true or false whether bitcoind is currently generating hashes
     *
     * @return boolean
     */
    public function getGenerate()
    {
        $response = $this->sendRequest('getgenerate');
        return $response->result;
    }

    /**
     * Returns a recent hashes per second performance measurement while generating.
     *
     * @return float
     */
    public function getHashesPerSec()
    {
        $response = $this->sendRequest('gethasespersec');
        return $response->result;
    }

    /**
     * Returns an object containing various state info.
     *
     * @return array
     */
    public function getInfo()
    {
        $response = $this->sendRequest('getinfo');
        return $response;
    }

    public function getMemoryPool($data = null)
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
    public function getMiningInfo()
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
     * @return
     */
    public function getNewAddress($account = '')
    {
        $response = $this->sendRequest('getnewaddress', $account);
        return $response;
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
    public function getPeerInfo()
    {
        $response = $this->sendRequest('getpeerinfo');
        return $response->result;
    }

    /**
     * Returns all transaction ids in memory pool
     *
     * @return
     */
    public function getRawMemPool()
    {
        $response = $this->sendRequest('getrawmempool');
        return $response->result;
    }

    /**
     * @param string $txid
     * @param integer $verbose
     * @return array
     */
    public function getRawTransaction($txid, $verbose = 0)
    {
        $response = $this->sendRequest('getrawtransaction', array($txid, $verbose));
        return $response->result;
    }

    /**
     * Returns the total amount received by addresses with [account] in transactions with at least [minconf] confirmations. If [account] not provided return will include all transactions to all accounts. (version 0.3.24)
     *
     * @param string $account
     * @param integer $minconf
     *
     * @return
     */
    public function getReceivedByAccount($account = '', $minconf = 1)
    {
        $response = $this->sendRequest('getreceivedbyaccount', array($account, $minconf));
        return $response->result;
    }

    /**
     * Returns the total amount received by <bitcoinaddress> in transactions with at least [minconf] confirmations. While some might consider this obvious, value reported by this only considers *receiving* transactions. It does not check payments that have been made *from* this address. In other words, this is not "getaddressbalance". Works only for addresses in the local wallet, external addresses will always show 0.
     *
     * @param string $bitcoinaddress
     * @param integer $minconf
     *
     * @return
     */
    public function getReceivedByAddress($bitcoinaddress, $minconf = 1)
    {
        $response = $this->sendRequest('getreceivedbyaddress', array($bitcoinaddress, $minconf));
        return $response->result;
    }

    /**
     * @param string $txid
     *
     * @return
     */
    public function getTransaction($txid)
    {
        $response = $this->sendRequest('gettransaction', $txid);
        return $response->result;
    }

    public function getWork()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function importPrivKey()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function keypoolRefill()
    {
        $response = $this->sendRequest('');
        return $response;
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
    public function listAccounts($minconf = 1)
    {
        $response = $this->sendRequest('listaccounts', $minconf);
        $accounts = array();
        foreach ($response->result as $account => $balance) {
            $accounts[] = array(
                'account' => $account,
                'balance' => $balance,
            );
        }
        return $accounts;
    }

    public function listReceivedByAccount()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function listReceivedByAddress()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function listSinceBlock()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function listTransactions()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function listUnspent()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function move()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function sendFrom()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function sendMany()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function sendRawTransaction()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function sendToAddress()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function setAccount()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function setGenerate()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function signMessage()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function signRawTransaction()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function setTxFee()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function stop()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function validateAddress()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function verifyMessage()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function walletLock()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function walletPassphrase()
    {
        $response = $this->sendRequest('');
        return $response;
    }

    public function walletPassphraseChange()
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
     * @return StdClass
     */
    public function sendRequest($method, $params = null, $id = null)
    {
        $url = sprintf('%s://%s:%s@%s:%s', $this->schema, $this->user, $this->password, $this->host, $this->port);
        $ch  = curl_init($url);

        if (null === $params) {
            $params = array();
        } elseif (!empty($params) && !is_array($params)) {
            $params = array($params);
        }

        $json = json_encode(array('method' => $method, 'params' => $params, 'id' => $id));
        curl_setopt_array($ch, array(
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => array('Content-type: application/json'),
            CURLOPT_POSTFIELDS     => $json,
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $stdClass = json_decode($response);

        if (!empty($stdClass->error)) {
            throw new \Exception($stdClass->error->message, $stdClass->error->code);
        }

        return $stdClass;
    }

}
