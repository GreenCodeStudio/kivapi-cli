<?php
include_once __DIR__ . '/../../../../autoload.php';
if (is_file("./Core/CLI/initCLI.php")) {
    include_once "./Core/CLI/initCLI.php";
}
$commandName = $_SERVER['argv'][1] ?? 'help';
$commandInfo = (new \Kivapi\KivapiCli\Core\ListCommands())->getByName($commandName);
if (empty($commandInfo)) {
    echo "Command not found, run help";
} else {
    $className = $commandInfo->className;
    $command = new $className();
    $command->arguments = array_slice($_SERVER['argv'], 2);
    $command->fillParameters();
    print_r($command->execute());
}