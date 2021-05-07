@if(isset($items))
<div>
    @foreach($items as $item)
    @include('articles::components.entry', ['item' => $item])
    @endforeach
</div>
@endif