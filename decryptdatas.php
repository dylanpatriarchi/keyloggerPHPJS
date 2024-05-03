<?php
require_once 'encryptionkeys.php';
if ($argc < 2) {
    echo "Usage: php script.php <log_filename>" . PHP_EOL;
    exit(1);
}

$logFileName = $argv[1];

if (!file_exists($logFileName)) {
    echo "File not found: $logFileName" . PHP_EOL;
    exit(1);
}

$logData = file_get_contents($logFileName);

$logEntries = explode(",", $logData);

foreach ($logEntries as $encryptedData) {
    $decrypted = openssl_decrypt($encryptedData, CIPHERING, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
    echo $decrypted . PHP_EOL;
}
