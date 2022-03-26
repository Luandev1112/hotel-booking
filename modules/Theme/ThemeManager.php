<?php
namespace Modules\Theme;

use Illuminate\Support\Facades\File;

class ThemeManager
{
    protected static $_all = [];

    public static function current(){
        return strtolower(config('bc.active_theme','base'));
    }
    public static function currentProvider(){
        return static::getProviderClass(static::current());
    }
    public static function getProviderClass($theme){
        return "\\Themes\\".ucfirst($theme)."\\ThemeProvider";
    }

    public static function all(){
        if(empty(static::$_all)){
            static::loadAll();
        }
        return static::$_all;
    }

    protected static function loadAll(){
        $listThemes = array_map('basename', File::directories(base_path("themes")));
        foreach ($listThemes as $theme){
            $class = static::getProviderClass($theme);
            if(class_exists($class)){
                self::$_all[$theme] = $class;
            }
        }
    }
}
