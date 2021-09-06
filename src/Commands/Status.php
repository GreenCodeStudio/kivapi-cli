<?php

namespace Kivapi\KivapiCli\Commands;

use Kivapi\KivapiCli\Core\SystemStatus;

class Status extends AbstractCommand
{
    public static function shortDescription(): string
    {
        return "information about system and also project";
    }

    public function execute()
    {
        echo "Status of system:\r\n";
        print_r(SystemStatus::prepare());
    }
}