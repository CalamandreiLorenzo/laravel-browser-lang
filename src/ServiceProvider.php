<?php
/**
 * CalamandreiLorenzo\LaravelBrowserLang
 */

namespace CalamandreiLorenzo\LaravelBrowserLang;

use function config_path;

/**
 * Class ServiceProvider.
 * @author Lorenzo Calamandrei <calamandrei.lorenzo@gmail.com>
 * @github https://github.com/CalamandreiLorenzo
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * boot
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/browser-lang.php' => config_path('browser-lang.php'),
        ], 'config');
    }

    /**
     * register
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/browser-lang.php',
            'browser-lang'
        );
    }
}
