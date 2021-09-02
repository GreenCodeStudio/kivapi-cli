<?php

namespace Kivapi\KivapiCli\Commands;
abstract class AbstractCommand
{
    public array $arguments=[];
    public abstract function execute();
}