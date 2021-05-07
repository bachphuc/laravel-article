@extends(__layout())

{{-- @push('scripts')
@include(\HtmlElements\TextEditor::assetViewPath(), ['elementId' => 'descEditor', 'type' => 'normal', 'uploadPath' => route('articles.upload-article-image')])
@endpush  --}}


@section('content')
<div class="container mb-5 mt-4">
    <h1 class="mt-2 mb-2">{{$article->getTitle()}}</h1>
    <h2 class="mt-2 mb-2">{{articles_trans('lang.edit_article')}}</h2>
    {!! $form->render() !!}
</div>
@endsection