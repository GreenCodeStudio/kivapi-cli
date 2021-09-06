<?php

namespace Kivapi\KivapiCli\Commands;
class Help extends AbstractCommand
{
    public static function shortDescription(): string
    {
        return "shows this information";
    }

    public function execute()
    {

        $commands = (new \Kivapi\KivapiCli\Core\ListCommands())->getInfo();
        $global = "";
        $project = "";
        foreach ($commands as $command) {
            if ($command->commandName == "Help" || $command->commandName == "Create" || $command->commandName == "Status")
                $global .= $command->commandName . " - " . $command->shortDescription . "\r\n";
            else
                $project .= $command->commandName . " - " . $command->shortDescription . "\r\n";
        }
        return <<<HELP
Kivapi - best CMS
        
Global commands
$global

Project commands
$project
HELP;
    }
}