<?php

namespace Ja\Shipping\Tests;

use Illuminate\Contracts\Config\Repository;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function defineEnvironment($app)
    {
        // Setup default database to use sqlite :memory:
        tap($app['config'], function (Repository $config) {
            $config->set('database.default', 'testbench');
            $config->set('database.connections.testbench', [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            ]);

            // Setup queue database connections.
            $config->set([
                'queue.batching.database' => 'testbench',
                'queue.failed.database' => 'testbench',
            ]);
        });
    }

    /**
     * Define routes setup.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function defineRoutes($router)
    {
        // Define routes.
        // $router->get('/', fn () => response('Hello world!'));
    }
}
