@if(isset($items))
<div class="container">
    <div>
        <div class="section-title">
            <h4>{{articles_trans('lang.new_articles')}}</h4>
        </div>
        <div>
            @foreach($items as $item)
            @include(articles_view_path('components.entry'), ['item' => $item])
            @endforeach
        </div>
    </div>
</div>
@endif