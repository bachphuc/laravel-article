@extends(__layout())

@section('content')
@if(size_of($articles))
@include(articles_view_path('articles.columns-block'), ['items' => $articles])
@else
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-md-12">
            <p>{{articles_trans('lang.no_article_found')}}</p>
        </div>
    </div>
</div>
@endif
@endsection