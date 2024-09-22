<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('Show ResCategory') }}
        </x-slot>
        <x-slot name="body">
            <p><strong>{{ ucwords(str_replace('_', ' ', 'name')) }}:</strong> {{ $res_category->name }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'slug')) }}:</strong> {{ $res_category->slug }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'image')) }}:</strong> {{ $res_category->image }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'serial')) }}:</strong> {{ $res_category->serial }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'color')) }}:</strong> {{ $res_category->color }}</p><p><strong>{{ ucwords(str_replace('_', ' ', 'is_active')) }}:</strong> {{ $res_category->is_active }}</p>
            {{--othersInfo--}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_categories.create') }}" />
            <x-smart-link-list href="{{ route('res_categories.index') }}" />
            <x-smart-link-edit href="{{ route('res_categories.edit', $res_category->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--pagespecific-css--}}
    @endpush

    @push('js')
    {{--pagespecific-js--}}
    @endpush
</x-smart-master>