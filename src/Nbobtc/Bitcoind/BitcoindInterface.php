<?php

namespace Nbobtc\Bitcoind;

/**
 * These commands should match the current RPC specs.
 *
 * @see https://github.com/bitcoin/bitcoin/blob/master/src/bitcoinrpc.cpp
 * @see https://github.com/bitcoin/bitcoin/blob/master/src/bitcoinrpc.h
 * @see https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_Calls_list
 * @author Joshua Estes
 */
interface BitcoindInterface
{

    /**
     * Add a nrequired-to-sign multisignature address to the wallet
     * each key is a Bitcoin address or hex-encoded public key
     * If $account is specified, assign address to $account
     *
     * @param integer $nrequired
     * @param string|array $keys
     * @param string|null $account
     * @return string
     */
    public function addmultisigaddress($nrequired, $keys, $account = null);

    /**
     * Back up the current wallet. Will return true if successful
     * or false on failure
     *
     * @param string $destination Path to backup location
     * @return boolean
     */
    public function backupwallet($destination);

    /**
     * Creates a multi-signature address and returns a json object
     * with keys:
     *     address: "bitcoin address"
     *     redeemScript: "hex-encoded redemption script"
     *
     * @return
     */
    public function createmultisig($nrequired, array $keys);

    /**
     * @TODO
     */
    public function createrawtransaction();

    /**
     * @param string $hex
     * @return
     */
    public function decoderawtransaction($hex);

    /**
     * @param string $address
     * @return
     */
    public function dumpprivkey($address);

    /**
     * Encrypts the wallet with $passphrase
     *
     * @param string $passphrase
     * @return
     */
    public function encryptwallet($passphrase);

    /**
     * Returns the account associated with the given address.
     *
     * @param string $address
     * @return string
     */
    public function getaccount($address);

    /**
     * Returns the current bitcoin address for receiving
     * payments to [account]
     *
     * @param string $account
     * @return string
     */
    public function getaccountaddress($account);

    /**
     * Returns the list of addresses for the given account.
     *
     * @param string $account
     * @return array
     */
    public function getaddressesbyaccount($account);

    /**
     * If $account is not specified, returns the server's total
     * available balance. If $account is specified, returns the
     * balance in the account.
     *
     * @param string $account
     * @param integer $minconf
     * @return float
     */
    public function getbalance($account = null, $minconf = 1);

    /**
     * @param string $hash
     * @return
     */
    public function getblock($hash);

    /**
     * @return integer
     */
    public function getblockcount();

    /**
     * @param integer $index
     * @return string
     */
    public function getblockhash($index);

    /**
     * @TODO
     * @return
     */
    public function getblocktemplate();

    /**
     * Returns the total number of peers that are connected
     *
     * @return integer
     */
    public function getconnectioncount();

    /**
     * Current blockchain difficulty.
     *
     * @see https://en.bitcoin.it/wiki/Difficulty
     * @return float
     */
    public function getdifficulty();

    /**
     * If bitcoind is set to try to generate blocks it will
     * return true, otherwise it will return false
     *
     * @return boolean
     */
    public function getgenerate();

    /**
     * @return float
     */
    public function gethashespersec();

    /**
     * Returns an object containing various state info.
     *
     * The stdClass:
     * (int) $version
     * (int) $protocolversion
     * (int) $walletversion
     * (double) $balance
     * (int) $blocks
     * (int) $connections
     * (string) $proxy
     * (double) $difficulty
     * (bool) $testnet
     * (int) $keypoololdest
     * (int) $keypoolsize
     * (double) $paytxfee
     * (int) $unlocked_until
     *
     * @return \stdClass
     */
    public function getinfo();

    /**
     * @return
     */
    public function getmininginfo();

    /**
     * Returns a new bitcoin address for receiving payments.
     *
     * @param null|string $account
     * @return string
     */
    public function getnewaddress($account = null);

    /**
     * @return
     */
    public function getpeerinfo();

    /**
     * @return
     */
    public function getrawmempool();

    /**
     * @param string $txid
     * @param boolean $verbose
     * @return
     */
    public function getrawtransaction($txid, $verbose = false);

    /**
     * Returns the total amount received by addresses with $account
     * in transactions with at least $minconf confirmations.
     *
     * @param string|null $account
     * @param integer $minconf
     * @return float
     */
    public function getreceivedbyaccount($account = null, $minconf = 1);

    /**
     * Returns the total amount received by $address in transactions
     * with at least $minconf confirmations.
     *
     * @param string|null $address
     * @param integer $minconf
     * @return float
     */
    public function getreceivedbyaddress($address = null, $minconf = 1);

    /**
     * Get detailed information about in-wallet transaction $txid
     *
     * @param string $txid Transaction ID
     * @return array
     */
    public function gettransaction($txid);

    /**
     * @TODO
     * @return
     */
    public function gettxout();

    /**
     * @TODO
     * @return
     */
    public function gettxoutsetinfo();

    /**
     * @param string|null $data
     * @return
     */
    public function getwork($data = null);

    /**
     * @param string|null $command
     * @return
     */
    public function help($command = null);

    /**
     * @param string $privkey
     * @param string|null $label
     * @return
     */
    public function importprivkey($privkey, $label = null);

    /**
     * Fills the keypool, returns true if successful or false
     * if there was an error.
     *
     * @return boolean
     */
    public function keypoolrefill();

    /**
     * Returns a key => value array with the key being that
     * of the address and the value is the balance
     *
     * @param integer $minconf
     * @return array
     */
    public function listaccounts($minconf = 1);

    /**
     * Lists groups of addresses which have had their common ownership
     * made public by common use as inputs or as the resulting change
     * in past transactions
     *
     * @return array
     */
    public function listaddressgroupings();

    /**
     * Returns list of temporarily unspendable outputs.
     *
     * @return boolean
     */
    public function listlockunspent();

    /**
     * Returns an array of abjects containing:
     *     account
     *     address
     *     confirmations
     *
     * @param integer $minconf Minimum number of confirmations before payments are included
     * @param boolean $includeempty Whether to include addresses that haven't received any payments.
     * @return array
     */
    public function listreceivedbyaccount($minconf = 1, $includeempty = false);

    /**
     * Returns an array of objects containing:
     *     account
     *     address
     *     amount
     *     confirmations
     *
     * @param integer $minconf Minimum number of confirmations before payments are included
     * @param boolean $includeempty Whether to include addresses that haven't received any payments.
     * @return array
     */
    public function listreceivedbyaddress($minconf = 1, $includeempty = false);

    /**
     * Get all transactions in blocks since block $hash, or all transactions
     * if $hash is null
     *
     * @param string|null $hash
     * @param integer $minconf
     * @return array
     */
    public function listsinceblock($hash = null, $minconf = 1);

    /**
     * Returns up to $count most recent transactions skipping the
     * first $from transactions for account $account.
     *
     * @return array
     */
    public function listtransactions($account = null, $count = 10, $from = 0);

    /**
     * @return
     */
    public function listunspent($minconf = 1, $maxconf = 999999);

    /**
     * Updates list of temporarily unspendable outputs.
     *
     * @return boolean
     */
    public function lockunspent();

    /**
     * Move from one account in your wallet to another.
     *
     * @return boolean
     */
    public function move($fromaccount, $toaccount, $amount, $minconf = 1, $comment = null);

    /**
     * $amount is rounded to the nearest 0.00000001
     *
     * @return string Transaction ID
     */
    public function sendfrom($account, $address, $amount, $minconf = 1, $comment = null, $commentto = null);

    /**
     * @return string Transaction ID
     */
    public function sendmany($fromaccount, array $addresses, $minconf = 1, $comment = null);

    /**
     * @return
     */
    public function sendrawtransaction($hex);

    /**
     * Send $amount to $address. $amount is rounded to nearest 0.00000001
     *
     * @return string txid
     */
    public function sendtoaddress($address, $amount, $comment = null, $commentto = null);

    /**
     * Sets the account associated with the given address
     *
     * @return boolean
     */
    public function setaccount($address, $account);

    /**
     * @return
     */
    public function setgenerate($generate, $genproclimit = -1);

    /**
     * @return
     */
    public function settxfee($amount);

    /**
     * Sign a message with the private key of an address
     *
     * @param string $address
     * @param string $message
     * @return string
     */
    public function signmessage($address, $message);

    /**
     * @return
     */
    public function signrawtransaction($hex, $txinfo, $keys);

    /**
     * @return
     */
    public function stop();

    /**
     * @TODO
     * @return
     */
    public function submitblock();

    /**
     * Returns information about $address
     *
     * @return array
     */
    public function validateaddress($address);

    /**
     * Verify a signed message
     *
     * @param string $address
     * @param string $signature
     * @param string $message
     * @return
     */
    public function verifymessage($address, $signature, $message);

    /**
     * Removes the wallet encryption key from memory, locking the wallet.
     * After calling this method, you will need to call walletpassphrase again
     * before being able to call any methods which require the wallet to be unlocked.
     *
     * @return boolean
     */
    public function walletlock();

    /**
     * Stores the wallet decryption key in memory for $timeout seconds.
     * Will return true if successful or false on error
     *
     * @param string $passphrase
     * @param integer $timeout
     * @return boolean
     */
    public function walletpassphrase($passphrase, $timeout);

    /**
     * Change the wallet passphrase from $oldpassphrase to $newpassphrase and
     * will return true if successful or false if there was an error
     *
     * @return boolean
     */
    public function walletpassphrasechange($oldpassphrase, $newpassphrase);

}
