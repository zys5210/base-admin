<?php
namespace Song\BaseAdmin\Providers;

use Illuminate\Support\ServiceProvider;
use Song\BaseAdmin\Console\InstallCommand;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
//        var_dump('adminServiceProvider');exit;
        $this->registerRouter();

        if ($this->app->runningInConsole()) {
//            $this->registerMigrations();

            $this->commands([
                InstallCommand::class
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../../views', 'admin');

        $this->publishes([
            __DIR__.'/../../assets' => public_path('static/admin'),
            ], 'public');

        $this->publishes([
            __DIR__.'/../../views' => resource_path('views/vendor/admin'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../config/admin.php' => config_path('admin.php'),
        ], 'config');
    }

    public function register()
    {

    }

    private function registerRouter()
    {
        require __DIR__.'/../Routes/admin.php';
    }
}
