<?php

namespace bachphuc\LaravelArticle\Http\Components;
use bachphuc\LaravelArticle\Models\Article;

class NewArticlesBlock extends ArticleBaseElement
{
    protected $viewPath = 'new-articles';

    public function run($params = []){
        $items = Article::orderBy('id', 'DESC')
        ->take(6)
        ->get();

        return [
            'items' => $items,
        ];
    }
}
