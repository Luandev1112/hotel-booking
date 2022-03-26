<?php
namespace Modules\Coupon;
use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(SitemapHelper $sitemapHelper){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'coupon'=>[
                "position"=>51,
                'url'        => route('coupon.admin.index'),
                'title'      => __('Coupon'),
                'icon'       => 'fa fa-ticket',
                'permission' => 'coupon_view',
            ],
        ];
    }
}
