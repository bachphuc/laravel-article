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

}