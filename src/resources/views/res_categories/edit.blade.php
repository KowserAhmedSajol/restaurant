<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Edit Res Category') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_categories.update', $res_category->uuid) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{ $decoration['class']['elementwrapper'] }}">
                        <div class="{{ $decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="nameInput">{{ __('Name') }}</x-smart-label>
                            <x-smart-text type="text" id="nameInput" name="name" :value="old('name', $res_category->name)"
                                placeholder="Enter Name" />
                        </div>
                    </div>
                    {{-- <div class="{{ $decoration['class']['elementwrapper'] }}">
                        <div class="{{ $decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="slugInput">{{ __('Slug') }}</x-smart-label>
                            <x-smart-text type="text" id="slugInput" name="slug" :value="old('slug', $res_category->slug)"
                                placeholder="Enter Slug" />
                        </div>
                    </div> --}}

                    <div class="{{ $decoration['class']['elementwrapper'] }}">
                        <div class="{{ $decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="serialInput">{{ __('Serial') }}</x-smart-label>
                            <x-smart-text type="text" id="serialInput" name="serial" :value="old('serial', $res_category->serial)"
                                placeholder="Enter Serial" />
                        </div>
                    </div>
                    <div class="{{ $decoration['class']['elementwrapper'] }}">
                        <div class="{{ $decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="colorInput">{{ __('Color') }}</x-smart-label>
                            <x-smart-text type="text" id="colorInput" name="color" :value="old('color', $res_category->color)"
                                placeholder="Enter Color" />
                        </div>
                    </div>
                    <div class="{{ $decoration['class']['elementwrapper'] }}">
                        <div class="{{ $decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="is_activeInput">{{ __('Is_active') }}</x-smart-label>
                            <x-smart-text type="text" id="is_activeInput" name="is_active" :value="old('is_active', $res_category->is_active)"
                                placeholder="Enter Is_active" />
                        </div>
                    </div>
                    <div class="{{ $decoration['class']['elementwrapper'] }}">
                        <div class="{{ $decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="imageInput">{{ __('Image') }}</x-smart-label>
                    
                            <!-- Display existing image if available -->
                            @if ($res_category->image)
                                <div>
                                    <img src="{{ asset('storage/' . $res_category->image) }}" alt="Current Image" style="max-width: 150px;">
                                </div>
                            @endif
                    
                            <!-- File input for uploading a new image -->
                            <x-smart-text type="file" id="imageInput" name="image" accept="image/*" />
                    
                            <!-- Optional: Include a hidden field to retain the old image if no new one is uploaded -->
                            <input type="hidden" name="old_image" value="{{ $res_category->image }}">
                        </div>
                    </div>
                    
                    <div class="{{ $decoration['class']['formfooter'] }}">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_categories.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
        {{-- page-specific-css --}}
    @endpush

    @push('js')
        {{-- page-specific-js --}}
    @endpush
</x-smart-master>
