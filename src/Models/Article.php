<?php

namespace bachphuc\LaravelArticle\Models;

class Article extends ArticleBase
{
    protected $table = 'mobi_articles';
    protected $itemType = 'mobi_article';

    const STATUS_DRAFF = 'draft';
    const STATUS_ACTIVE = 'active';
    const STATUS_UNPUBLISH = 'unpublish';

    public static $STATUSES = [Article::STATUS_DRAFF, Article::STATUS_ACTIVE, Article::STATUS_UNPUBLISH];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'short_description',
        'content',
        'total_comment',
        'total_like',
        'thumbnail_500',
        'image',
        'cover',
        'alias',
        'site_id',
        'category_id',
        'status',
        'thumbnail_320',
        'thumbnail_270',
        'thumbnail_120',
        'source_name',
        'source_url',
        'total_view',
        'is_disable_ads',
        'is_expired',
        'category_type',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('\bachphuc\LaravelArticle\Models\ArticleCategory');
    }
}