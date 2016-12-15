<?php

namespace Nbobtc\Bitcoind;

/**
 * @author Joshua Estes
 */
class Bitcoind implements BitcoindInterface
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function help($command = null)
    {
        $response = $this->client->execute('help', $command);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function abandontransaction($txid)
    {
        $response = $this->client->execute('abandontransaction', array($txid));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function addmultisigaddress($nrequired, $keys, $account = null)
    {
        $response = $this->client->execute('addmultisigaddress', array($keys, $account));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function backupwallet($destination)
    {
        $response = $this->client->execute('backupwallet', $destination);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function createmultisig($nrequired, array $keys)
    {
        $response = $this->client->execute('createmultisig', array($nrequired, $keys));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function createrawtransaction(array $transactions, $addresses)
    {
        $response = $this->client->execute('createrawtransaction', array($transactions, $addresses));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function decoderawtransaction($hex)
    {
        $response = $this->client->execute('decoderawtransaction', $hex);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function dumpprivkey($address)
    {
        $response = $this->client->execute('dumpprivkey', $address);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function encryptwallet($passphrase)
    {
        $response = $this->client->execute('encryptwallet', $passphrase);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getaccount($address)
    {
        $response = $this->client->execute('getaccount', $address);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getaccountaddress($account)
    {
        $response = $this->client->execute('getaccountaddress', (string) $account);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getaddressesbyaccount($account)
    {
        $response = $this->client->execute('getaddressesbyaccount', $account);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getbalance($account = null, $minconf = 1)
    {
        $response = $this->client->execute('getbalance', array((string) $account, (integer) $minconf));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblock($hash, $verbose = true)
    {
        $response = $this->client->execute('getblock', array($hash, $verbose));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblockcount()
    {
        $response = $this->client->execute('getblockcount');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblockhash($index)
    {
        $response = $this->client->execute('getblockhash', $index);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getblocktemplate($options = null)
    {
        $response = $this->client->execute('getblocktemplate', $options);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getconnectioncount()
    {
        $response = $this->client->execute('getconnectioncount');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getdifficulty()
    {
        $response = $this->client->execute('getdifficulty');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getgenerate()
    {
        $response = $this->client->execute('getgenerate');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gethashespersec()
    {
        $response = $this->client->execute('gethasespersec');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getinfo()
    {
        $response = $this->client->execute('getinfo');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getmemorypool($data = null)
    {
        $response = $this->client->execute('getmemorypool', $data);
        return $response->result;
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
        $response = $this->client->execute('getmininginfo');
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
        $response = $this->client->execute('getnewaddress', (string) $account);
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
        $response = $this->client->execute('getpeerinfo');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getrawmempool($verbose = false)
    {
        $response = $this->client->execute('getrawmempool', $verbose);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getrawtransaction($txid, $verbose = false)
    {
        $response = $this->client->execute('getrawtransaction', array($txid, (integer) $verbose));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getreceivedbyaccount($account = null, $minconf = 1)
    {
        $response = $this->client->execute('getreceivedbyaccount', array((string) $account, $minconf));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getreceivedbyaddress($address = null, $minconf = 1)
    {
        $response = $this->client->execute('getreceivedbyaddress', array($address, $minconf));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gettransaction($txid)
    {
        $response = $this->client->execute('gettransaction', $txid);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gettxout($txid, $n, $includemempool = true)
    {
        $response = $this->client->execute('gettxout', array($txid, $n, $includemempool));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function gettxoutsetinfo()
    {
        $response = $this->client->execute('gettxoutsetinfo');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function getwork($data = null)
    {
        $response = $this->client->execute('getwork', $data);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function importprivkey($privkey, $label = null, $rescan = true)
    {
        $response = $this->client->execute('importprivkey', array($privkey, (string) $label, (bool) $rescan));
        return $response->result;
    }

    /**
     * NOTE: Must run walletPassphrase method before this
     * @return null
     */
    public function keypoolrefill()
    {
        $response = $this->client->execute('keypoolrefill');
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
        $response = $this->client->execute('listaccounts', (integer) $minconf);
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
        $response = $this->client->execute('listaddressgroupings');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listlockunspent()
    {
        $response = $this->client->execute('listlockunspent');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listreceivedbyaccount($minconf = 1, $includeempty = false)
    {
        $response = $this->client->execute('listreceivedbyaccount', array($minconf, $includeempty));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listreceivedbyaddress($minconf = 1, $includeempty = false)
    {
        $response = $this->client->execute('listreceivedbyaddress', array(
            (int) $minconf,
            $includeempty
        ));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listsinceblock($hash = null, $minconf = 1)
    {
        $response = $this->client->execute('listsinceblock', array($hash, $minconf));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listtransactions($account = null, $count = 10, $from = 0)
    {
        $response = $this->client->execute('listtransactions', array((string) $account, $count, $from));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function listunspent($minconf = 1, $maxconf = 999999, array $addresses = array())
    {
        $response = $this->client->execute('listunspent', array($minconf, $maxconf, $addresses));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function lockunspent()
    {
        $response = $this->client->execute('lockunspent');
        return $response->result;
    }


    /**
     * @inheritdoc
     */
    public function move($fromaccount, $toaccount, $amount, $minconf = 1, $comment = null)
    {
        $response = $this->client->execute('move', array(
            (string) $fromaccount,
            (string) $toaccount,
            (float) $amount,
            (integer) $minconf,
            (string) $comment,
        ));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function sendfrom($account, $address, $amount, $minconf = 1, $comment = null, $commentto = null)
    {
        $response = $this->client->execute('sendfrom', array(
            $account,
            $address,
            (float) $amount,
            $minconf,
            $comment,
            $commentto,
        ));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function sendmany($fromaccount, array $addresses, $minconf = 1, $comment = null)
    {
        $response = $this->client->execute('sendmany', array(
            $fromaccount,
            $addresses,
            $minconf,
            $comment,
        ));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function sendrawtransaction($hex, $allowhighfees = false)
    {
        $response = $this->client->execute('sendrawtransaction', array($hex, $allowhighfees));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function sendtoaddress($address, $amount, $comment = null, $commentto = null)
    {
        $response = $this->client->execute('sendtoaddress', array(
            $address,
            $amount,
            $comment,
            $commentto,
        ));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function setaccount($address, $account)
    {
        $response = $this->client->execute('setaccount', array($address, $account));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function setgenerate($generate, $genproclimit = -1)
    {
        $response = $this->client->execute('setgenerate', array($generate, $genproclimit));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function settxfee($amount)
    {
        $response = $this->client->execute('settxfee', $amount);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function signmessage($address, $message)
    {
        $response = $this->client->execute('signmessage', array($address, $message));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function signrawtransaction($hex, array $txinfo = array(), array $keys = array(), $sighashtype = 'ALL')
    {
        $response = $this->client->execute('signrawtransaction', array($hex, $txinfo, $keys, $sighashtype));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function stop()
    {
        $response = $this->client->execute('stop');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function submitblock()
    {
        $response = $this->client->execute('submitblock');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function validateaddress($address)
    {
        $response = $this->client->execute('validateaddress', $address);
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function verifymessage($address, $signature, $message)
    {
        $response = $this->client->execute('verifymessage', array($address, $signature, $message));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function walletlock()
    {
        $response = $this->client->execute('walletlock');
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function walletpassphrase($passphrase, $timeout)
    {
        $response = $this->client->execute('walletpassphrase', array($passphrase, $timeout));
        return $response->result;
    }

    /**
     * @inheritdoc
     */
    public function walletpassphrasechange($oldpassphrase, $newpassphrase)
    {
        $response = $this->client->execute('walletpassphrasechange', array($oldpassphrase, $newpassphrase));
        return $response->result;
    }
}
