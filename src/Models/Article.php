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
        'image',
        'thumbnail_500',
        'thumbnail_320',
        'thumbnail_270',
        'thumbnail_120',
        'cover',
        'alias',
        'site_id',
        'category_id',
        'status',
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

    public function getHref(){
        if(!empty($this->alias)){
            return route('articles.detail', ['alias' => $this->alias]);
        }
        return route('articles.show', ['id' => $this->id]);
    }

    public function getEditHref(){
        return route('articles.edit', ['id' => $this->id]);
    }

    public static function getByAlias($alias){
        return Article::where('alias', $alias)
        ->orWhere('id', $alias)
        ->first();
    }

    public function updateAlias(){
        if(!empty($this->alias)) return;

        $this->alias = str_slug($this->title) . '-' . $this->id;
        $this->save();
    }

    public static function getCreateHref(){
        return route('articles.create');
    }

    public static function getIndexHref(){
        return route('articles.index');
    }

    public function getRelated($params = []){
        $length = isset($params['length']) ? (int) $params['length'] : 4;
        return Article::where('id', '<>' , $this->id)
        ->take($length)
        ->get();
    }
}