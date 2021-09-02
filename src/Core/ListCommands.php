<?php

namespace Kivapi\KivapiCli\Core;

use Kivapi\KivapiCli\Commands\AbstractCommand;

class ListCommands
{
    public function getByName($name)
    {
        $name = strtolower($name);
        foreach ($this->getRaw() as $command) {
            if (is_a($command->className, AbstractCommand::class, true)) {
                if (strtolower($command->commandName) == $name) {
                    return $command;
                }
            }
        }
    }

    public function getRaw()
    {
        foreach ($this->getLocal() as $item) {
            yield $item;
        }
        foreach ($this->getCore() as $item) {
            yield $item;
        }
    }

    private function getLocal()
    {
        $dir = __DIR__ . "/../Commands";
        foreach (scandir($dir) as $filename) {
            if (is_file($dir . "/" . $filename) && str_ends_with(strtolower($filename), ".php")) {
                $commandName = substr($filename, 0, -4);
                yield (object)['className' => "\Kivapi\KivapiCli\Commands\\$commandName", 'commandName' => $commandName];
            }
        }
    }

    private function getCore()
    {
        $dir = "./Core";
        foreach (scandir($dir) as $dirName) {
            $subdir = $dir . "/" . $dirName . "/CLI";
            if (is_dir($subdir)) {
                foreach (scandir($subdir) as $filename) {
                    if (is_file($subdir . "/" . $filename) && str_ends_with(strtolower($filename), "command.php")) {
                        $commandName = substr($filename, 0, -strlen("Command.php"));
                        yield (object)['className' => "\Core\\$dirName\CLI\\{$commandName}Command", 'commandName' => $commandName];
                    }
                }
            }
        }
    }
}