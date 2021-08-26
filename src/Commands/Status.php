<?php

namespace Kivapi\KivapiCli\Commands;

use Kivapi\KivapiCli\Core\SystemStatus;

class Status extends AbstractCommand
{

    public function execute()
    {
        echo "Status of system:\r\n";
        print_r(SystemStatus::prepare());
    }
}