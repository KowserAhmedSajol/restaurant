<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Create Res Category') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="nameInput">{{ __('Name') }}</x-smart-label>
                            <x-smart-text type="text" id="nameInput" name="name" :value="old('name')" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="imageInput">{{ __('Image') }}</x-smart-label>
                            <x-smart-text type="file" id="imageInput" name="image" :value="old('image')" placeholder="Enter Image" />
                        </div>
                    </div><div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="serialInput">{{ __('Serial') }}</x-smart-label>
                            <x-smart-text type="text" id="serialInput" name="serial" :value="old('serial')" placeholder="Enter Serial" />
                        </div>
                    </div><div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="colorInput">{{ __('Color') }}</x-smart-label>
                            <x-smart-text type="text" id="colorInput" name="color" :value="old('color')" placeholder="Enter Color" />
                        </div>
                    </div><div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="is_activeInput">{{ __('Is_active') }}</x-smart-label>
                            <x-smart-text type="yesno" id="is_activeInput" name="is_active" :value="old('is_active')" placeholder="Enter Is_active" />
                        </div>
                    </div>
                    <div class="{{$decoration['class']['formfooter']}} mt-2">
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
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>