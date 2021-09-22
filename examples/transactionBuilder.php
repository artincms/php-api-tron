<?php
$fullNode = new \artincms\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \artincms\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \artincms\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \artincms\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\artincms\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


try {
    $transaction = $tron->getTransactionBuilder()->sendTrx('to', 2,'fromAddress');
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
} catch (\artincms\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}
