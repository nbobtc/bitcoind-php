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
     * @param integer $nrequired
     * @param string|array $keys
     * @param string|null $account
     * @return
     */
    public function addmultisigaddress($nrequired, $keys, $account = null);

    /**
     * @param string $destination
     * @return
     */
    public function backupwallet($destination);

    /**
     * @TODO
     */
    public function createmultisig();

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
     * @param string $passphrase
     * @return
     */
    public function encryptwallet($passphrase);

    /**
     * @param string $address
     * @return
     */
    public function getaccount($address);

    /**
     * @param string $account
     * @return
     */
    public function getaccountaddress($account);

    /**
     * @param string $account
     * @return
     */
    public function getaddressesbyaccount($account);

    /**
     * @param string $account
     * @param integer $minconf
     * @return
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
     * @return
     */
    public function getblockhash($index);

    /**
     * @TODO
     * @return
     */
    public function getblocktemplate();

    /**
     * @return
     */
    public function getconnectioncount();

    /**
     * @return
     */
    public function getdifficulty();

    /**
     * @return
     */
    public function getgenerate();

    /**
     * @return
     */
    public function gethashespersec();

    /**
     * @return
     */
    public function getinfo();

    /**
     * @return
     */
    public function getmininginfo();

    /**
     * @param string $account
     * @return
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
     * @param boolean $vaerbose
     * @return
     */
    public function getrawtransaction($txid, $verbose = false);

    /**
     * @param string|null $account
     * @param integer $minconf
     * @return
     */
    public function getreceivedbyaccount($account = null, $minconf = 1);

    /**
     * @param string|null $address
     * @param integer $minconf
     * @return
     */
    public function getreceivedbyaddress($address = null, $minconf = 1);

    /**
     * @param string $txid
     * @return
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
     * @return
     */
    public function keypoolrefill();

    /**
     * @param interger $minconf
     * @return
     */
    public function listaccounts($minconf = 1);

    /**
     * @TODO
     * @return
     */
    public function listaddressgroupings();

    /**
     * @TODO
     * @return
     */
    public function listlockunspent();

    /**
     * @param integer $minconf
     * @param boolean $includeempty
     * @return
     */
    public function listreceivedbyaccount($minconf = 1, $includeempty = false);

    /**
     * @param integer $minconf
     * @param boolean $includeempty
     * @return
     */
    public function listreceivedbyaddress($minconf = 1, $includeempty = false);

    /**
     * @param string|null $hash
     * @param integer $minconf
     * @return
     */
    public function listsinceblock($hash = null, $minconf = 1);

    /**
     * @return
     */
    public function listtransactions($account = null, $count = 10, $from = 0);

    /**
     * @return
     */
    public function listunspent($minconf = 1, $maxconf = 999999);

    /**
     * @TODO
     * @return
     */
    public function lockunspent();

    /**
     * @return
     */
    public function move($fromaccount, $toaccount, $amount, $minconf = 1, $comment = null, $commentto = null);

    /**
     * @return
     */
    public function sendfrom($account, $address, $amount, $minconf = 1, $comment = null, $commentto = null);

    /**
     * @return
     */
    public function sendmany($fromaccount, array $addresses, $minconf = 1, $comment = null);

    /**
     * @return
     */
    public function sendrawtransaction($hex);

    /**
     * @return
     */
    public function sendtoaddress($address, $amount, $comment = null, $commentto = null);

    /**
     * @return
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
     * @return
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
     * @return
     */
    public function validateaddress($address);

    /**
     * @return
     */
    public function verifymessage($address, $signature, $message);

    /**
     * @return
     */
    public function walletlock();

    /**
     * @return
     */
    public function walletpassphrase($passphrase, $timeout);

    /**
     * @return
     */
    public function walletpassphrasechange($oldpassphrase, $newpassphrase);

}
