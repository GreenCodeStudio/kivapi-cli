<?php

namespace Kivapi\KivapiCli\Commands;

abstract class AbstractCommandGroup extends AbstractCommand
{
    abstract function getSubCommands(): array;

    function execute()
    {
        $subcommandName = strtolower($this->arguments[0] ?? "");
        if ($subcommandName == "" || $subcommandName == "help") {
            $ret = "";
            foreach ($this->getSubCommands() as $name => $className) {
                $description = call_user_func($className . "::shortDescription");
                $ret .= "$name - $description\r\n";
            }
            return $ret;
        } else {
            foreach ($this->getSubCommands() as $name => $className) {
                if (strtolower($name) == $subcommandName) {
                    $subcommand = new $className;
                    $subcommand->arguments = array_slice($this->arguments, 1);
                    $subcommand->fillParameters();
                    return $subcommand->execute();
                }
            }
        }
        echo "Subcommand not found";
    }
}