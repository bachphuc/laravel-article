<?php

namespace bachphuc\LaravelArticle\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

use LaravelTheme;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'bachphuc\LaravelArticle\Http\Controllers';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $packagePath = dirname(__DIR__);

        // register view
        $this->loadViewsFrom($packagePath . '/resources/views', 'articles');

        $this->loadMigrationsFrom($packagePath.'/database/migrations');

        // boot translator
        $this->loadTranslationsFrom($packagePath . '/resources/lang' , 'articles');

        \HtmlElement::mapNamespace('articles', '\bachphuc\LaravelArticle');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Register the service provider for the dependency.
         */

        $this->mapRoutes();

        $this->app->bind('laravel_article', function(){
            return new \bachphuc\LaravelArticle\LaravelArticle();
        });

        $this->app->bind('mobi_article_category', '\bachphuc\LaravelArticle\Models\ArticleCategory');
        $this->app->bind('mobi_article', '\bachphuc\LaravelArticle\Models\Article');

        LaravelTheme::registerFacade('laravel_article');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function mapRoutes()
    {
        // $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $packagePath = dirname(__DIR__);
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group($packagePath. '/routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $packagePath = dirname(__DIR__);
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group($packagePath . '/routes/api.php');
    }
}