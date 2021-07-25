<?php

namespace bachphuc\LaravelArticle\Http\Controllers;
use LaravelArticle;
use HtmlElements\Form;
use Illuminate\Http\Request;
use bachphuc\LaravelArticle\Models\Article;
use bachphuc\LaravelArticle\Models\ArticleCategory;
use HtmlElements\TextEditor;
use Session;

class CategoryController extends Controller
{
    public function show(Request $request, $alias){
        $category = ArticleCategory::findByAlias($alias);
        if(!$category){
            abort(404);
            return;
        }

        $params = $request->all();
        $length = $request->query('length') ? (int) $request->query('length') : 12;
        $query = Article::where('category_id', $category->id)
        ->orderBy('id', 'DESC');

        $articles = $query->paginate($length);

        return __view('articles::categories.show', [
            'category' => $category,
            'articles' => $articles
        ]);
    }
}