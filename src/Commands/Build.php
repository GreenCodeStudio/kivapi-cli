<?php

namespace Kivapi\KivapiCli\Commands;

use Kivapi\KivapiCli\Core\SystemStatus;

class Build extends AbstractCommand
{

    public function execute()
    {
        include './Core/Build.php';
    }
}