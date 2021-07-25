<?php

namespace bachphuc\LaravelArticle\Http\Components;
use bachphuc\LaravelArticle\Models\Article;

class ArticleColumnsBlock extends ArticleBaseElement
{
    protected $viewPath = 'article-columns-block';

    public function run($params = []){
        $items = Article::orderBy('id', 'DESC')
        ->take(6)
        ->get();

        return [
            'items' => $items,
        ];
    }
}
