<?php
/**
 * Requires curl enabled in php.ini
 * Retrieves a list of the top 100 cryptocurrency and the exchange rate in USD
 **/

 // Log hash
printf ('%s', $hash));

// include things
include __DIR__ . '/vendor/autoload.php';
include __FILE__ . 'ipfs.php';

// initialize wallet
use \Arweave\SDK\Arweave;
use \Arweave\SDK\Support\Wallet;
// Creating a Arweave object, this is the primary SDK class,
// It contains the public methods for creating, sending and getting transactions
$arweave = new \Arweave\SDK\Arweave('https', 'arweave.net', '443');
// Decode our JWK file to a PHP array named $jwk
$jwk = json_decode(file_get_contents('/jwk.json'), true);
// Create a new wallet using the $jwk array
$wallet =  new \Arweave\SDK\Support\Wallet($jwk);

// Create a new ARWEAVE transaction to store the verified data
$transaction = $arweave->createTransaction($wallet, [
    'data' => $json_data,
    'tags' => [
        'Content-Type' => 'application/json'
    ]
]);
// Outputs the transaction id which is stored in the logfile via cron
printf ('%s', $transaction->getAttribute('id'));
// 1 transaction id per line
printf("\n");
// Send the transaction to the arweave network
// $arweave->commit($transaction);
$arweave->api()->commit($transaction);
?>
