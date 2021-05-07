<?php

namespace bachphuc\LaravelArticle\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ManageCategoryController extends ManageBaseController{
    protected $modelName = 'article_category';
    protected $model = '\bachphuc\LaravelArticle\Models\ArticleCategory';
    protected $activeMenu = 'categories';
    protected $searchFields = ['title', 'description'];
    protected $modelRouteName = 'admin.article-categories';
    // protected $modelWiths = ['category'];
    protected $itemDisplayField = 'title';

    public function __construct(){
        $this->formElements = [
            'title' => [
                'validator' => 'required',
                'type' => 'text',
            ],
            'description' => [
                'type' => 'text',
                'validator' => 'required',
            ],
            'image' => [
                'type' => 'image_input',
                'thumbnail' => true
            ],
            'user',
            'alias' => 'title'
        ];

        $this->breadcrumbs = [
            [
                'title' => 'Categories',
                'url' => route($this->modelRouteName. '.index')
            ]
        ];

        $this->fields = [
            'id',
            'image' => [
                'type' => 'image'
            ],
            'title' => [
                'render' => function($item){
                    $html = '<p><a href="' . $item->getAdminHref() . '">' . $item->title . '</a> </p>';
                    $html.= '<p>'. str_limit($item->description, 180) . '</p>';
    
                    return $html;
                }
            ],
            'category' => [
                'title' => trans('shopy::lang.parent_category'),
                'render' => function($item){
                    if(!$item->category) return;
                    return $item->category->getTitle();
                }
            ]
        ];

        parent::__construct();
    }

    public function processTable(&$table){

    }

    public function afterUpdate(Request $request, $item){
        $item->updateTotalProducts();
    }

    public function initFormInput($isUpdate = false){
        parent::initFormInput($isUpdate);

        $this->form->setAttribute('ajax', true);
    }
}