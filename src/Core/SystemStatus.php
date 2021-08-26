<?php

namespace Kivapi\KivapiCli\Core;

class SystemStatus
{
    public static function prepare()
    {
        $ret = new SystemStatus();
        $ret->php = phpversion();
        $ret->yarn = exec('yarn -v');
        $ret->node = exec('node -v');
        $ret->git = exec('git --version');
        return $ret;
    }
}