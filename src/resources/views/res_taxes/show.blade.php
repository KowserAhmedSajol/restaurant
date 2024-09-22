<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResTax') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'name')) }}:</strong> {{ $res_tax->name }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'percentage')) }}:</strong> {{ $res_tax->percentage }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'status')) }}:</strong> {{ $res_tax->status }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_taxes.create') }}" />
            <x-smart-link-list href="{{ route('res_taxes.index') }}" />
            <x-smart-link-edit href="{{ route('res_taxes.edit', $res_tax->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>