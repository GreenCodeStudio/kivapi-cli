<?php

namespace Kivapi\KivapiCli\Commands;

use stdClass;

class Create extends AbstractCommand
{

    public function execute()
    {
        $config = $this->getConfig();

        var_dump($config);

        system("git clone https://github.com/GreenCodeStudio/kivapi-clean.git $config->name");
        chdir($config->name);
        $this->unlink_r(".git");
        exec("git init");
        exec("git add *");
        exec("git commit -m \"init\"");
        //https://github.com/GreenCodeStudio/kivapi-clean.git
    }

    public function getConfig()
    {
        $config = new StdClass();

        echo "Name of project:";
        $config->name = trim(fgets(STDIN));
        if (empty($config->name))
            throw new \Exception('Name cannot be empty');

        echo "Base url prefix [http://localhost]:";
        $config->urlPrefix = trim(fgets(STDIN));
        if (empty($config->urlPrefix))
            $config->urlPrefix = 'http://localhost';

        echo "MySql server [localhost]:";
        $config->sqlServer = trim(fgets(STDIN));
        if (empty($config->sqlServer))
            $config->sqlServer = 'localhost';

        echo "MySql user [root]:";
        $config->sqlUser = trim(fgets(STDIN));
        if (empty($config->sqlUser))
            $config->sqlUser = 'root';

        echo "MySql password:";
        $config->sqlPassword = rtrim(fgets(STDIN), "\r\n");
        if (empty($config->sqlPassword))
            $config->sqlPassword = null;

        echo "MySql database [$config->name]:";
        $config->sqlDatabase = trim(fgets(STDIN));
        if (empty($config->sqlDatabase))
            $config->sqlDatabase = $config->name;

        return $config;
    }

    function unlink_r($from)
    {
        if (!file_exists($from)) {
            return false;
        }
        $dir = opendir($from);
        while (false !== ($file = readdir($dir))) {
            if ($file == '.' or $file == '..') {
                continue;
            }

            if (is_dir($from . DIRECTORY_SEPARATOR . $file)) {
                $this->unlink_r($from . DIRECTORY_SEPARATOR . $file);
            } else {
                unlink($from . DIRECTORY_SEPARATOR . $file);
            }
        }
        rmdir($from);
        closedir($dir);
        return true;
    }
}