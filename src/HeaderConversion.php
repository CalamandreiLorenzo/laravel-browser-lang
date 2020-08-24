<?php
/**
 * CalamandreiLorenzo\LaravelBrowserLang
 */

namespace CalamandreiLorenzo\LaravelBrowserLang;

use Illuminate\Support\Facades\App;

/**
 * Class HeaderConversion
 * @package CalamandreiLorenzo\LaravelBrowserLang
 * @author Lorenzo Calamandrei <calamandrei.lorenzo.work@gmail.com>
 * @github https://github.com/CalamandreiLorenzo
 */
class HeaderConversion implements HeaderConversionInterface
{
    /**
     * convert
     * @param string $header
     * @return string
     */
    public function convert(string $header): string
    {
        $langs = collect(explode(',', $header))->map(static function (string $lang) {
            if (str_contains($lang, ';')) {
                $langWithQ = explode(';', $lang);
                return collect([
                    'locale' => $langWithQ[0],
                    'q-factor' => $langWithQ[1]
                ]);
            }
            if (str_contains($lang, '-')) {
                $langParam = explode('-', $lang)[0];
                return collect([
                    'locale' => $langParam,
                    'q-factor' => null
                ]);
            }
            return $lang;
        })->whereIn('locale', config('browser-lang.available_locales', ['en']));
        return $langs->first()->get('locale', App::getLocale());
    }
}
