<?php

namespace Kivapi\KivapiCli\Commands;
class Help extends AbstractCommand
{

    public function execute()
    {
        return <<<HELP
Kivapi - best CMS
        
Global commands
help - shows this information
create - creates new project
status - information about system and also project

Project commands
build - build projects with yarn & webpack
        
HELP;
    }
}