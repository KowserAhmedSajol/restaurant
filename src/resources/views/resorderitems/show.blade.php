<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResOrderItem') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'qty')) }}:</strong> {{ $res_order_item->qty }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'rate')) }}:</strong> {{ $res_order_item->rate }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'amount')) }}:</strong> {{ $res_order_item->amount }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_order_items.create') }}" />
            <x-smart-link-list href="{{ route('res_order_items.index') }}" />
            <x-smart-link-edit href="{{ route('res_order_items.edit', $res_order_item->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>