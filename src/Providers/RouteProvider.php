<?php

namespace CFV\PhalconCli\Providers;

use CFV\PhalconCli\Tasks\MyFirstTask;
use CFV\PhalconCli\Tasks\NotFoundTask;
use Phalcon\Cli\Router;
use Phalcon\Di\ServiceProviderInterface;

class RouteProvider implements ServiceProviderInterface
{
    public function register(\Phalcon\DiInterface $di)
    {
        /** @var Router $router */
        $router = $di->get("router");
        $router->setDefaults([
            "task" => NotFoundTask::class,
            "action" => "missing"
        ]);

        /** @var Router\Route $route */
        $route = $router->add("ns:task", [
            "task" => MyFirstTask::class,
            "action" => "action"
        ]);

        $route
            //->convert('param', function () { })
            ->setName("namespace:task")
            ->beforeMatch(function () {
                return true;
            });

        $route = $router->add("task", [
            "task" => MyFirstTask::class,
            "action" => "action"
        ]);
    }
}
