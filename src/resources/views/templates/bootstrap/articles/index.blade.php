@extends(__layout())

@section('content')
    <div class="container mt-5 mb-5">
        <h1>{{articles_trans('lang.articles_page_index_title')}}</h1>

        @if(auth()->check())
        <div class="text-right mb-4">
            <a href="{{route('articles.create')}}" class="btn btn-primary">@lang('articles::lang.create_new_article')</a>
        </div>
        @endif
        
        <div>
            @if(size_of($items))
            @foreach($items as $item)
            @include(articles_view_path('components.entry'), ['item' => $item])
            @endforeach

            @include(articles_view_path('components.paginate'))

            @else
            <p>{{articles_trans('lang.no_articles')}}</p>
            @endif
        </div>
    </div>
@endsection