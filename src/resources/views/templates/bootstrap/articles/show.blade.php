@extends(__layout())

@section('content')
    <div class="container mt-4 mb-5">
        <h1>{{$article->getTitle()}} 
            @if($article->canEdit())
            <small><em><a href="{{route('articles.edit', ['article' => $article])}}">{{articles_trans('lang.edit')}}</a></em></small>
            @endif
        </h1>
        <div class="mt-2 mb-2">{{$article->short_description}}</div>
        <div class="text-center">
            <img src="{{$article->getImage()}}" />
        </div>
        <div class="mt-4">
            {!! $article->content !!}
        </div>

        @include(articles_view_path('components.related-articles'))
    </div>
@endsection