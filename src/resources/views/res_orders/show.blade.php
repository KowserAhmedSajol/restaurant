<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResOrder') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'order_no')) }}:</strong> {{ $res_order->order_no }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'order_date')) }}:</strong> {{ $res_order->order_date }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'total_qty')) }}:</strong> {{ $res_order->total_qty }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'status')) }}:</strong> {{ $res_order->status }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'order_time')) }}:</strong> {{ $res_order->order_time }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_orders.create') }}" />
            <x-smart-link-list href="{{ route('res_orders.index') }}" />
            <x-smart-link-edit href="{{ route('res_orders.edit', $res_order->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>