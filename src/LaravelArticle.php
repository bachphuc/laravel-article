<?php

namespace bachphuc\LaravelArticle;

use bachphuc\LaravelArticle\Models\Article;

class LaravelArticle
{
    public function getAdminMenus(){
        return [[
            'title' => 'Article Categories',
            'icon' => 'dashboard',
            'url' => url('admin/article-categories'),
            'key' => 'article_categories',
        ], [
            'title' => 'Articles',
            'icon' => 'dashboard',
            'url' => url('admin/articles'),
            'key' => 'articles',
        ]];
    }

    public function getNewestArticles(){
        $articles = Article::orderBy('created_at', 'DESC')
        ->get();

        return $articles;
    }

    public function newestBlock(){
        $articles = $this->getNewestArticles();
        return view('articles::components.newest', [
            'items' => $articles
        ]);
    }

    public function articles($params = []){
        $length = isset($params['length']) ? (int) $params['length'] : 8;

        return Article::orderBy('id', 'DESC')
        ->take($length)
        ->get();
    }

    public function trans($key, $default = ''){
        if(\Lang::has($key)) return trans($key);
        if(\Lang::has('articles::' . $key)) return trans('articles::' . $key);
        if(\Lang::has('articles::lang.' . $key)) return trans('articles::lang.' . $key);
        
        if(!empty($default)) return $default;
        return $key;
    }

    public function viewPath($path){
        return __view_path($path, 'articles');
    }
}