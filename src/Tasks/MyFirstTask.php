<?php

namespace CFV\PhalconCli\Tasks;

use Phalcon\Cli\Task;

class MyFirstTask extends Task
{
    public function action()
    {
        $result = [
            "Class: " . self::class,
            "Method:" . __FUNCTION__,
            "Arguments: " . json_encode(func_get_args())
        ];

        print implode(PHP_EOL, $result);
    }
}
