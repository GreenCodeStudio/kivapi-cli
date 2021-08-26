<?php
include_once __DIR__ . '/../../vendor/autoload.php';
$commandName = $_SERVER['argv'][1] ?? 'help';
$className = "\Kivapi\KivapiCli\Commands\\$commandName";
$command = new $className(array_slice($_SERVER['argv'], 2));
print_r($command->execute());