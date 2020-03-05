<?php 

namespace nnbao\Press;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

class PressBaseServiceProvider extends ServiceProvider{
	public function boot(){

		$this->registerResources();

		$this->publishes([
                __DIR__.'/../config/press.php' => config_path('press.php'),
            ], 'press');

		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');

		$this->loadTranslationsFrom(__DIR__.'/../resources/lang/en', 'press');

		$this->loadViewsFrom(__DIR__.'/../resources/views', 'press');

		 $this->publishes([
        __DIR__.'/../resources/lang/en' => resource_path('lang/en','press'),
    ]);
	}

	public function register(){
		if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/press.php', 'press');
        }

   
	}
	protected function registerResources(){
		$this->registerRoutes();
	}

	public function registerRoutes(){
		Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
	}

	public function routeConfiguration()
    {
        return [
            'prefix' => 'package',
            'namespace' => 'nnbao\Press\Http\Controllers',
        ];
    }
}