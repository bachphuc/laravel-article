<?php

namespace bachphuc\LaravelArticle\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ManageArticleController extends ManageBaseController{
    protected $modelName = 'article';
    protected $model = '\bachphuc\LaravelArticle\Models\Article';
    protected $activeMenu = 'articles';
    protected $searchFields = ['title', 'description'];
    protected $modelRouteName = 'admin.articles';
    protected $modelWiths = ['category'];
    protected $itemDisplayField = 'title';

    public function __construct(){
        $this->breadcrumbs = [
            [
                'title' => 'Categories',
                'url' => route($this->modelRouteName. '.index')
            ]
        ];

        parent::__construct();
    }

    public function createTableFields(){
        return  [
            'id',
            'image' => [
                'title' => trans('articles::lang.image'),
                'type' => 'image'
            ],
            'title' => [
                'title' => trans('articles::lang.title'),
                'render' => function($item){
                    $html = '<p><a href="' . $item->getHref() . '">' . $item->title . '</a> </p>';
                    $html.= '<p>'. str_limit($item->description, 180) . '</p>';
    
                    return $html;
                }
            ],
            'category' => [
                'title' => trans('articles::lang.category'),
                'render' => function($item){
                    if(!$item->category) return;
                    return $item->category->getTitle();
                }
            ]
        ];
    }

    public function createFormElements($isUpdate = false){
        return  [
            'title' => [
                'title' => articles_trans('lang.title'),
                'validator' => 'required',
                'type' => 'text',
            ],
            'short_description' => [
                'title' => articles_trans('lang.short_description'),
                'type' => 'text',
                'validator' => 'required',
            ],
            'category_id' => [
                'title' => articles_trans('lang.category'),
                'type' => 'select',
                'options' => [
                    'model' => 'mobi_article_category'
                ]
            ],
            'image' => [
                'type' => 'image_input',
                'thumbnail' => true
            ],
            'content' => [
                'title' => articles_trans('lang.content'),
                'type' => 'text_editor',
                'validator' => 'required',
                'allow_upload_image' => true,
                'upload_image_url' => route('tinymce.image.upload')
            ],
            'user',
            'alias' => 'title'
        ];
    }

    public function processTable(&$table){
        $table->setAttribute('disableEditModalMode', true);
    }

    public function afterUpdate(Request $request, $item){
        
    }

    public function initFormInput($isUpdate = false){
        parent::initFormInput($isUpdate);

        $this->form->setAttribute('ajax', true);
    }
}