<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Show Res Category') }}
        </x-slot>
        <x-slot name="body">
            <div class="card">
                <div class="card-body">
                    <!-- Name -->
                    <p><strong>{{ ucwords(str_replace('_', ' ', 'name')) }}:</strong> {{ $res_category->name }}</p>
            
                    <!-- Slug -->
                    <p><strong>{{ ucwords(str_replace('_', ' ', 'slug')) }}:</strong> {{ $res_category->slug }}</p>
            
                    <!-- Image Display -->
                    <p><strong>{{ ucwords(str_replace('_', ' ', 'image')) }}:</strong></p>
                    @if ($res_category->image)
                        <div>
                            <img src="{{ asset('storage/' . $res_category->image) }}" alt="Image" class="img-fluid img-thumbnail" style="max-width: 200px;">
                        </div>
                    @else
                        <p>No Image Available</p>
                    @endif
            
                    <!-- Serial -->
                    <p><strong>{{ ucwords(str_replace('_', ' ', 'serial')) }}:</strong> {{ $res_category->serial }}</p>
            
                    <!-- Color Badge -->
                    <p><strong>{{ ucwords(str_replace('_', ' ', 'color')) }}:</strong>
                        <span class="badge" style="background-color: {{ $res_category->color }}; color: #fff;">
                            {{ $res_category->color }}
                        </span>
                    </p>
            
                    <!-- Active Status Badge -->
                    <p><strong>{{ ucwords(str_replace('_', ' ', 'is_active')) }}:</strong>
                        @if ($res_category->is_active == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </p>
                </div>
            </div>
            
            {{-- othersInfo --}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_categories.create') }}" />
            <x-smart-link-list href="{{ route('res_categories.index') }}" />
            <x-smart-link-edit href="{{ route('res_categories.edit', $res_category->uuid) }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
        {{-- pagespecific-css --}}
    @endpush

    @push('js')
        {{-- pagespecific-js --}}
    @endpush
</x-smart-master>
