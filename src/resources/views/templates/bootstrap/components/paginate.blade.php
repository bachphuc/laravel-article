@if(isset($items) && $items && method_exists($items, 'total'))
<div class="paginate">
    <div class="paginate-total mb-2 float-lg-left">
        @lang('elements::lang.paginate_text', ['length' => $items->count(), 'total' => $items->total(), 'type' => isset($item_type) ? $item_type : trans('lang.object_s')])
    </div>
    <div class="paginate-items float-lg-right">
        @if(isset($params) && !empty($params))
        {{ $items->appends($params)->links(articles_view_path('components.pagination')) }}
        @else
        {{ $items->links(articles_view_path('components.pagination')) }}
        @endif
    </div>
    <div class="clear clearfix"></div>
</div>
@endif