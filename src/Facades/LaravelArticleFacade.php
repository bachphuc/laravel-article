<?php

namespace bachphuc\LaravelArticle\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelArticleFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'laravel_article'; }

    public static function routes($params = []){
        $router = static::$app->make('router');

        $namespace = '\bachphuc\LaravelArticle\Http\Controllers\\';

        $alias = isset($params['alias']) ? $params['alias'] : 'articles';

        // article routes

        $router->get('/' .      $alias,                             $namespace . 'ArticleController@index')->name('articles.index');
        $router->get('/' .      $alias . '/' . trans('articles::lang.create-article-path'),  $namespace . 'ArticleController@create')->name('articles.create');
        $router->get('/' .      $alias . '/{article}',              $namespace . 'ArticleController@detail')->name('articles.show');
        
        $router->post('/' .     $alias ,                            $namespace . 'ArticleController@store')->name('articles.store');
        $router->get('/' .      $alias . '/{article}/edit',         $namespace . 'ArticleController@edit')->name('articles.edit');
        $router->put('/' .      $alias . '/{article}',              $namespace . 'ArticleController@update')->name('articles.update');
        $router->delete('/' .   $alias . '/{article}',              $namespace . 'ArticleController@destroy')->name('articles.destroy');
    

        $router->get('/' .      $alias . '/{alias}',       $namespace . 'ArticleController@detail')->name('articles.detail');

        // categories routers
        $categoryAlias = isset($params['category_alias']) ? $params['category_alias'] : 'categories';

        $router->get('/' . $alias . '/' . $categoryAlias . '/{alias}', $namespace . 'CategoryController@show')->name('articles.categories.show');
    }

    public static function adminRoutes(){
        $router = static::$app->make('router');

        $router->group([ 'as' => 'admin.'], function() use($router) {
            $namespace = '\bachphuc\LaravelArticle\Http\Controllers\\Admin\\';

            $router->resource('/article-categories', $namespace . 'ManageCategoryController');
            $router->resource('/articles', $namespace. 'ManageArticleController');
        });
    }
}