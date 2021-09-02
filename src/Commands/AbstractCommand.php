<?php

namespace Kivapi\KivapiCli\Commands;

use stdClass;

abstract class AbstractCommand
{
    public array $arguments = [];
    public object $parameters;

    public abstract function execute();

    public static function getParameters(): array
    {
        return [];
    }

    public function fillParameters()
    {
        $this->parameters = $this->parameters ?? new StdClass();
        foreach (static::getParameters() as $name => $info) {
            echo "$name:";
            $this->parameters->$name = trim(fgets(STDIN));
        }
    }
}