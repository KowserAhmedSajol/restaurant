<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResTable') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'name')) }}:</strong> {{ $res_table->name }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'capacity')) }}:</strong> {{ $res_table->capacity }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'status')) }}:</strong> {{ $res_table->status }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'color')) }}:</strong> {{ $res_table->color }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'is_occupied')) }}:</strong> {{ $res_table->is_occupied }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_tables.create') }}" />
            <x-smart-link-list href="{{ route('res_tables.index') }}" />
            <x-smart-link-edit href="{{ route('res_tables.edit', $res_table->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>