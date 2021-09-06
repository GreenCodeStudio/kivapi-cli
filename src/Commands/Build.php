<?php

namespace Kivapi\KivapiCli\Commands;

use Kivapi\KivapiCli\Core\SystemStatus;

class Build extends AbstractCommand
{
    public static function shortDescription(): string
    {
        return "build projects with yarn & webpack";
    }

    public function execute()
    {
        include './Core/Build.php';
    }
}