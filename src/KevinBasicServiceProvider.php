<?php

namespace Kevinchengjian\Toolkit;

use Illuminate\Support\ServiceProvider;

/**
 * Class KevinBasicServiceProvider
 * @package Kevinchengjian\Toolkit
 */
class KevinBasicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // 基础工具类
            $this->publishes([
                __DIR__ . '/../stubs' => $this->app->basePath('stubs'),
                __DIR__ . '/Http/Controllers/AbstractController.php' => app_path('Http/Controllers/AbstractController.php'),
                __DIR__ . '/Traits/BasicModelTrait.php' => app_path('Traits/BasicModelTrait.php'),
                __DIR__ . '/Models/AbstractModel.php' => app_path('Models/AbstractModel.php'),
                __DIR__ . '/Models/PersonalAccessToken.php' => app_path('Models/PersonalAccessToken.php'),
                __DIR__ . '/Traits/ResponseTrait.php' => app_path('Traits/ResponseTrait.php'),
                __DIR__ . '/Http/Requests/AbstractRequest.php' => app_path('Http/Requests/AbstractRequest.php'),
                __DIR__ . '/Enums/Api/Message.php' => app_path('Enums/Api/Message.php'),
                __DIR__ . '/Enums/Api/Status.php' => app_path('Enums/Api/Status.php'),
                __DIR__ . '/Enums/Api/AuthGuard.php' => app_path('Enums/Api/AuthGuard.php'),
                __DIR__ . '/Enums/Status.php' => app_path('Enums/Status.php')
            ], 'toolkit-basic');

            // 后台基础框架
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
                __DIR__ . '/Enums/PmType.php' => app_path('Enums/PmType.php'),
                __DIR__ . '/Http/Controllers/System' => app_path('Http/Controllers/System'),
                __DIR__ . '/Http/Requests/System' => app_path('Http/Requests/System'),
                __DIR__ . '/Models/SystemUser.php' => app_path('Models/SystemUser.php'),
                __DIR__ . '/Models/SystemPermission.php' => app_path('Models/SystemPermission.php'),
                __DIR__ . '/Annotations/PermissionAnnotations.php' => app_path('Annotations/PermissionAnnotations.php'),
                __DIR__ . '/Commands/ParsePermission.php' => app_path('Console/Commands/ParsePermission.php')
            ], 'toolkit-system');
        }
    }
}
