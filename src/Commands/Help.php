<?php

namespace Kivapi\KivapiCli\Commands;
class Help extends AbstractCommand
{

    public function execute()
    {
        return "Kivapi - best CMS
        
Global commands
help - shows this informations
create - creates new project
status - information about system and also project

Project comamnds
build - build projects with yarn & webpack
        ";
    }
}