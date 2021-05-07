@if(isset($item))
<div class="mt-2">
    <div class="d-lg-flex flex-row shadow mb-5 bg-body rounded">
        @if($item->image)
        <img class="rounded-left w-lg-320 mw-lg-320 fit-cover" src="@__img" alt="@__title" />
        @endif
        <div class="p-3">
            <h4 class="mt-2"><a href="@__href">@__title</a></h4>
            <p class="mt-2">@__g('short_description')</p>
            <div class="mt-2">
                <a href="@__href">{{articles_trans('lang.read_more')}}</a>
                @if($item->canEdit())
                <a class="ml-2" href="@__edit_href">✎ {{articles_trans('lang.edit')}}</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif