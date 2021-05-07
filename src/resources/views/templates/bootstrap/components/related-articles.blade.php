<h4 class="mt-4">{{articles_trans('lang.related_articles')}}</h4>
<div class="row mt-2">
    @foreach($article->getRelated() as $relatedArticle)
        @include(articles_view_path('components.entry-card'), ['item' => $relatedArticle])
    @endforeach
</div>