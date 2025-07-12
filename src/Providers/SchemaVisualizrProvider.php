<?php 

namespace LaraCare\SchemaVisualizr\Providers;

use Illuminate\Support\ServiceProvider;

class SchemaVisualizrProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \LaraCare\SchemaVisualizr\Commands\VisualizrCommand::class,
            ]);
        }
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // $this->loadViewsFrom(__DIR__.'/../views', 'inspire');
    }
}