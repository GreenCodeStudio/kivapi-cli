<?php

namespace Kivapi\KivapiCli\Commands;
abstract class AbstractCommand
{
    public array $arguments = [];
    public object $parameters = (object)[];

    public abstract function execute();

    public static function getParameters(): array
    {
        return [];
    }

    public function fillParameters()
    {
        foreach (static::getParameters() as $name => $info) {
            echo "$name:";
            $this->parameters->$name = trim(fgets(STDIN));
        }
    }
}