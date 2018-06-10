<?php

namespace CFV\PhalconCli;

use Phalcon\Annotations\Adapter\Memory as Annotations;
use Phalcon\Cli\Dispatcher;
use Phalcon\Cli\Router;
use Phalcon\Cli\Router\Route;
use Phalcon\Di as PhalconDi;
use Phalcon\Escaper;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Filter;
use Phalcon\Mvc\Model\Manager as ModelManager;
use Phalcon\Mvc\Model\MetaData\Memory as ModelsMetaData;
use Phalcon\Mvc\Model\Transaction\Manager as TransactionManager;
use Phalcon\Security;

class Di extends PhalconDi
{
    public function __construct()
    {
        parent::__construct();

        $this->setShared('dispatcher', function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setTaskSuffix('');
            $dispatcher->setActionSuffix('');
            return $dispatcher;
        });

        $this->setShared('router', function () {
            Route::delimiter(':');
            return new Router(false);
        });
        
        $this->setShared("eventsManager", EventsManager::class);
        $this->setShared("modelsManager", ModelManager::class);
        $this->setShared("modelsMetadata", ModelsMetaData::class);
        $this->setShared("filter", Filter::class);
        $this->setShared("escaper", Escaper::class);
        $this->setShared("annotations", Annotations::class);
        $this->setShared("security", Security::class);
        $this->setShared("transactionManager", TransactionManager::class);
    }
}
