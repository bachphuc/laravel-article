@extends(__layout())

{{-- @push('scripts')
@include(\HtmlElements\TextEditor::assetViewPath(), ['elementId' => 'descEditor', 'type' => 'normal', 'uploadPath' => route('articles.upload-article-image')])
@endpush  --}}


@section('content')
<div class="container mt-5 mb-5">
    <h2 class="mt-2 mb-2">{{articles_trans('lang.create_article')}}</h2>
    {!! $form->render() !!}
</div>
@endsection