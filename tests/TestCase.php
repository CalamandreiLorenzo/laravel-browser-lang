<?php
/**
 * Tests
 */

namespace Tests;

use CalamandreiLorenzo\LaravelBrowserLang\ServiceProvider;
use Illuminate\Foundation\Application;

/**
 * Class TestCase
 * @package Tests
 * @author Lorenzo Calamandrei <calamandrei.lorenzo@gmail.com>
 * @github https://github.com/CalamandreiLorenzo
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * getPackageProviders
     * Load package service provider.
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }
}
