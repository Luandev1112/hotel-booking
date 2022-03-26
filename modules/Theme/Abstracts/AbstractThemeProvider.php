<?php
namespace Modules\Theme\Abstracts;

use Illuminate\Support\ServiceProvider;

abstract class AbstractThemeProvider extends ServiceProvider
{

    public static $name;

    public static $screenshot;

    public static $version = "1.0";

    /**
     * Return Theme Info
     *
     * @return array
     */
    abstract static function info();

    public function register(){}

    public function boot(){}

}
