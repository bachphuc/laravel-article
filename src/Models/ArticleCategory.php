<?php

namespace bachphuc\LaravelArticle\Models;

class ArticleCategory extends ArticleBase
{
    protected $table = 'mobi_article_categories';
    protected $itemType = 'mobi_article_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'thumbnail_120',
        'thumbnail_300',
        'thumbnail_500',
        'thumbnail_720',
        'alias',
        'total_article',
        'color',
        'icon_text',
        'icon_class',
        'site_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function articles(){
        return $this->hasMany('\bachphuc\LaravelArticle\Models\Article', 'category_id');
    }
}