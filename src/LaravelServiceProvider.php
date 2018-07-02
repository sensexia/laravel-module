<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/25 下午2:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Houdunwang\Module;

use Houdunwang\Module\Commands\MenuInstallCommand;
use Houdunwang\Module\Commands\ModuleInstallAllCommand;
use Houdunwang\Module\Commands\ModuleInstallCommand;
use Houdunwang\Module\Commands\PermissionCreateCommand;
use Houdunwang\Module\Services\MenusService;
use Illuminate\Support\ServiceProvider;
use Houdunwang\Module\Commands\ModuleCreateCommand;
use Houdunwang\Module\Commands\ConfigCreateCommand;

class LaravelServiceProvider extends ServiceProvider
{
    public $singletons = [
        'hd-menu' => MenusService::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModuleCreateCommand::class,
                ModuleInstallCommand::class,
                ModuleInstallAllCommand::class,
                MenuInstallCommand::class,
                ConfigCreateCommand::class,
                PermissionCreateCommand::class,
            ]);
        }
        //数据迁移文件
        //$this->publishes(
        //    [__DIR__.'/Migrations/2018_07_02_155409_create_modules_table.php'=>
        //    $this->app->databasePath().'/migrations/2018_07_02_155409_create_modules_table.php']
        //);
        //
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
