<?php
/**
 * Tests
 */

namespace Tests;

use CalamandreiLorenzo\LaravelBrowserLang\Http\Middleware\BrowserLang;
use Illuminate\Support\Facades\App;

/**
 * Class FeatureTest
 * @package Tests
 * @author Lorenzo Calamandrei <calamandrei.lorenzo.work@gmail.com>
 * @github https://github.com/CalamandreiLorenzo
 */
class FeatureTest extends TestCase
{
    /**
     * setUp
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->app['router']->group(
            ['middleware' => BrowserLang::class],
            function () {
                $this->app['router']->get('see-locale', static function () {
                    return response()->json([
                        'locale' => App::getLocale()
                    ]);
                });
            }
        );
    }

    /**
     * @test
     */
    public function the_route_should_be_accessible_with_en_us_headers(): void
    {
        $response = $this->get('see-locale');
        $response->assertOk();
        self::assertEquals('en', $response->json('locale'));
    }

    /**
     * @test
     */
    public function with_not_available_lang_should_return_en(): void
    {
        $response = $this->get('see-locale', [
            'Accept-Language' => 'it-IT,en-US'
        ]);
        $response->assertOk();
        self::assertEquals('en', $response->json('locale'));
    }

    /**
     * @test
     */
    public function with_available_lang_should_return_the_first_available(): void
    {
        config(['browser-lang.available_locales' => ['en', 'it']]);
        $response = $this->get('see-locale', [
            'Accept-Language' => 'it-IT,en-US'
        ]);
        $response->assertOk();
        self::assertEquals('it', $response->json('locale'));
    }
}
