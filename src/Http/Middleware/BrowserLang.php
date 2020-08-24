<?php
/**
 * CalamandreiLorenzo\LaravelBrowserLang\Http\Middleware
 */

namespace CalamandreiLorenzo\LaravelBrowserLang\Http\Middleware;

use CalamandreiLorenzo\LaravelBrowserLang\HeaderConversion;
use CalamandreiLorenzo\LaravelBrowserLang\HeaderConversionInterface;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function config;

/**
 * Class BrowserLang
 * @package CalamandreiLorenzo\LaravelBrowserLang\Http\Middleware
 * @author Lorenzo Calamandrei <calamandrei.lorenzo.work@gmail.com>
 * @github https://github.com/CalamandreiLorenzo
 */
class BrowserLang
{
    /**
     * handle
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $langFromHeader = $request->hasHeader(
            config('browser-lang.language_header', 'Accept-Language')
        );
        if (!$langFromHeader) {
            return $next($request);
        }

        /** @var HeaderConversionInterface $resolver */
        $resolver = resolve(config('browser-lang.resolver', HeaderConversion::class));

        $lang = $resolver->convert(
            $request->headers->get(config('browser-lang.language_header', 'Accept-Language'))
        );
        App::setLocale($lang);
        return $next($request);
    }
}
