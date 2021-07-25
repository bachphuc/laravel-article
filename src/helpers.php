<?php
    function articles_list($params = []){
        return LaravelArticle::articles($params);
    }

    function articles_trans($key, $default = ''){
        return LaravelArticle::trans($key, $default);
    }

    function articles_view_path($path){
        return LaravelArticle::viewPath($path);
    }

    function articles_categories($params = []){
        return LaravelArticle::categories();
    }