<h1 align="center"> laravel-browser-lang </h1>

<p align="center"> Auto detect browser default language </p>

<p align="center">
<a href="https://github.com/CalamandreiLorenzo/laravel-browser-lang/actions"><img src="https://github.com/CalamandreiLorenzo/laravel-browser-lang/workflows/CI/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/calamandrei-lorenzo/laravel-browser-lang"><img src="https://poser.pugx.org/calamandrei-lorenzo/laravel-browser-lang/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/calamandrei-lorenzo/laravel-browser-lang"><img src="https://poser.pugx.org/calamandrei-lorenzo/laravel-browser-lang/v/unstable.svg" alt="Latest Unstable Version"></a>
<a href="https://scrutinizer-ci.com/g/CalamandreiLorenzo/laravel-browser-lang/?branch=master"><img src="https://scrutinizer-ci.com/g/CalamandreiLorenzo/laravel-browser-lang/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality"></a>
<a href="https://scrutinizer-ci.com/g/CalamandreiLorenzo/laravel-browser-lang/?branch=master"><img src="https://scrutinizer-ci.com/g/CalamandreiLorenzo/laravel-browser-lang/badges/coverage.png?b=master" alt="Code Coverage"></a>
<a href="https://packagist.org/packages/calamandrei-lorenzo/laravel-browser-lang"><img src="https://poser.pugx.org/calamandrei-lorenzo/laravel-browser-lang/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/calamandrei-lorenzo/laravel-browser-lang"><img src="https://poser.pugx.org/calamandrei-lorenzo/laravel-browser-lang/license" alt="License"></a>
</p>


This package make available a middleware that auto-detect the language accepted from the browser and set it as current locale.


## Requirement

 1. PHP >= 7.4
 2. laravel/framework >= 5.8|6.0|7.0
 
 Tested on laravel/framework >= 7.0

## Installing

```shell
$ composer require calamandrei-lorenzo/laravel-browser-lang
```

Optional, you can publish the config file:

```bash
$ php artisan vendor:publish --provider="CalamandreiLorenzo\\LaravelBrowserLang\\ServiceProvider" --tag=config
```

---

Implement the middleware in your `App\Http\Kernel`:

```php
class Kernel extends HttpKernel
{
        /**
         * The application's route middleware.
         *
         * These middleware may be assigned to groups or used individually.
         *
         * @var array
         */
        protected $routeMiddleware = [
            // ...
            'detect-language' => \CalamandreiLorenzo\LaravelBrowserLang\Http\Middleware\BrowserLang::class
        ];
}
```

## Usage

```php
Route::middleware('detect-language')->group(static function () {
    // routes
});
```

Otherwise set it as a global middleware in your `App\Http\Kernel` file.
```php
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // ...
        \CalamandreiLorenzo\LaravelBrowserLang\Http\Middleware\BrowserLang::class
    ];
}
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/CalamandreiLorenzo/laravel-browser-lang/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/CalamandreiLorenzo/laravel-browser-lang/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
