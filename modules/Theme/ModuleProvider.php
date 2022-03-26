<?php
namespace Modules\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use League\Flysystem\Config;
use Themes\Base\ThemeProvider;

class ModuleProvider extends \Modules\ModuleServiceProvider
{
    public function boot(Request $request){


        if(!is_installed() || strpos($request->path(), 'install') !== false) return false;

        \Illuminate\Support\Facades\Config::set('bc.active_theme', env('BC_DEFAULT_THEME','base'));

        //	 load Theme overwrite
	    $active = ThemeManager::current();

	    if(strtolower($active) != "base"){
            View::addLocation(base_path("themes".DIRECTORY_SEPARATOR.ucfirst($active)));
            // Load modules views
            $this->loadModuleViews($active);
        }

        // Base Theme require
        View::addLocation(base_path(DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR."Base"));

	    // Load modules views
        $this->loadModuleViews('base');
    }
    protected function loadModuleViews($theme){

        $listModule = array_map('basename', File::directories(base_path('modules')));

        foreach ($listModule as $module) {

            if (is_dir(base_path('themes/'.ucfirst($theme) .'/'. $module))) {
                $this->loadViewsFrom(base_path('themes/'.ucfirst($theme) .'/'. $module), $module);
            }
        }

        if (is_dir(base_path('themes/'.ucfirst($theme).'/Layout'))) {
            $this->loadViewsFrom(base_path('themes/'.ucfirst($theme).'/Layout'), 'Layout');
        }
    }
    public function register()
    {
        $this->app->register(\Modules\Theme\RouterServiceProvider::class);
//        Base Theme require
	    $this->app->register(ThemeProvider::class);

//	    load Theme overwrite
	    $class = \Modules\Theme\ThemeManager::currentProvider();
        if(class_exists($class)){
            $this->app->register($class);
        }

    }

}
