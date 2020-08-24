<?php
/**
 * CalamandreiLorenzo\LaravelBrowserLang
 */

namespace CalamandreiLorenzo\LaravelBrowserLang;

/**
 * Interface HeaderConversionInterface
 * @package CalamandreiLorenzo\LaravelBrowserLang
 * @author Lorenzo Calamandrei <calamandrei.lorenzo.work@gmail.com>
 * @github https://github.com/CalamandreiLorenzo
 */
interface HeaderConversionInterface
{
    /**
     * convert
     * @param string $header
     * @return string
     */
    public function convert(string $header): string;
}
