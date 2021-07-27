<?php

namespace bachphuc\LaravelArticle\Http\Controllers;
use LaravelArticle;
use HtmlElements\Form;
use Illuminate\Http\Request;
use bachphuc\LaravelArticle\Models\Article;
use HtmlElements\TextEditor;
use Session;

class ArticleController extends Controller
{
    public function __construct() 
    {
        theme_active_menu('articles.index');
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $length = $request->query('length') ? (int) $request->query('length') : 12;
        $query = Article::orderBy('id', 'DESC');

        $items = $query->paginate($length);

        return __view('articles::articles.index', [
            'items' => $items,
            'params' => $params
        ]);
    }

    public function createForm(){
        $form = Form::create([
            'action' => route('articles.store'),
            'has_file' => true,
            'elements' => [
                'title' => [
                    'title' => articles_trans('lang.article_title'),
                ],
                'category_id' => [
                    'title' => articles_trans('lang.category'),
                    'type' => 'select',
                    'options' => [
                        'model' => 'mobi_article_category'
                    ]
                ],
                'image' => [
                    'title' => articles_trans('lang.image'),
                    'type' => 'image_input'
                ],
                'short_description' => [
                    'title' => articles_trans('lang.short_desc'),
                    'type' => 'text_content'
                ],
                'content' => [
                    'title' => articles_trans('lang.content'),
                    'type' => 'text_editor',
                    'id' => 'descEditor',
                    'allow_upload_image' => true,
                    'upload_image_url' => route('tinymce.image.upload')
                ],
                'user' => true
            ]
        ]);

        return $form;
    }

    public function create()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $form = $this->createForm();
        $form->setAttribute('cancelUrl', Article::getIndexHref());

        return __view('articles::articles.create', [
            'form' => $form
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();
        $insert = [
            'title' => $data['title'],
            'short_description' => $data['title'],
            'content' => $data['content'],
            'user_id' => user_id()
        ];

        $article = Article::create($insert);
        $article->uploadPhoto();

        $article->updateAlias();

        return redirect()->route('articles.show', ['article' => $article] );
    }

    public function show(Request $request, Article $article)
    {
        meta_subject($article);
        return __view('articles::articles.ashion-detail', [
            'article' => $article
        ]);

        // return __view('articles::articles.show', [
        //     'article' => $article
        // ]);
    }

    public function detail(Request $request, $alias){
        $article = Article::getByAlias($alias);
        if(!$article){
            abort(404);
            return;
        }
       
        return $this->show($request, $article);
    }

    public function edit(Request $request, Article $article){
        $form = $this->createForm();
        $form->setAttribute('action', route('articles.update', ['article' => $article]));
        $form->setAttribute('method', 'PUT');
        $form->setItem($article);
        $form->setAttribute('isUpdate', true);
        $form->setAttribute('cancelUrl', $article->getHref());

        return __view('articles::articles.edit', [
            'article' => $article,
            'form' => $form
        ]);
    }

    public function update(Request $request, Article $article){
        $update = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'content' => 'required',
        ]);

        $article->update($update);
        $article->uploadPhoto();

        Session::flash('message', articles_trans('lang.update_article_success'));

        return redirect()->route('articles.show', ['article' => $article]);
    }
}