<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResBilling') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'status')) }}:</strong> {{ $res_billing->status }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'date')) }}:</strong> {{ $res_billing->date }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'time')) }}:</strong> {{ $res_billing->time }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_billings.create') }}" />
            <x-smart-link-list href="{{ route('res_billings.index') }}" />
            <x-smart-link-edit href="{{ route('res_billings.edit', $res_billing->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>