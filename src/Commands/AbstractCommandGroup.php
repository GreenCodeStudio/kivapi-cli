<?php

namespace Kivapi\KivapiCli\Commands;

abstract class AbstractCommandGroup extends AbstractCommand
{
    abstract function getSubCommands(): array;

    function execute()
    {
        $subcommandName = strtolower($this->arguments[0] ?? "");
        foreach ($this->getSubCommands() as $name => $className) {
            if (strtolower($name) == $subcommandName) {
                $subcommand = new $className;
                $subcommand->arguments = array_slice($this->arguments, 1);
                return $subcommand->execute();
            }
        }
        echo "Subcommand not found";
    }
}