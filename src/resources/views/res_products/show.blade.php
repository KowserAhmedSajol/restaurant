<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResProduct') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'name')) }}:</strong> {{ $res_product->name }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'price')) }}:</strong> {{ $res_product->price }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'image')) }}:</strong> {{ $res_product->image }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'status')) }}:</strong> {{ $res_product->status }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'serial')) }}:</strong> {{ $res_product->serial }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_products.create') }}" />
            <x-smart-link-list href="{{ route('res_products.index') }}" />
            <x-smart-link-edit href="{{ route('res_products.edit', $res_product->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>