@if(size_of($items))
@foreach($items as $item)
@include(articles_view_path('components.entry'), ['item' => $item])
@endforeach
@endif