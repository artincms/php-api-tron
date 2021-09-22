<?php
include_once '../vendor/autoload.php';

$fullNode = new \artincms\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \artincms\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \artincms\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \artincms\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\artincms\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


$tron->setAddress('address');
$balance = $tron->getBalance(null, true);