<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Edit ResProduct') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_products.update', $res_product->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_categoryInput">{{ __('Res_category') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_categorys" name="res_category" :value="old('res_category', $res_product->res_category)"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="nameInput">{{ __('Name') }}</x-smart-label>
        <x-smart-text type="text" id="nameInput" name="name" :value="old('name', $res_product->name)" placeholder="Enter Name" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="priceInput">{{ __('Price') }}</x-smart-label>
        <x-smart-text type="text" id="priceInput" name="price" :value="old('price', $res_product->price)" placeholder="Enter Price" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="imageInput">{{ __('Image') }}</x-smart-label>
        <x-smart-text type="text" id="imageInput" name="image" :value="old('image', $res_product->image)" placeholder="Enter Image" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="statusInput">{{ __('Status') }}</x-smart-label>
        <x-smart-text type="yesno" id="statusInput" name="status" :value="old('status')" placeholder="Enter Status" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="serialInput">{{ __('Serial') }}</x-smart-label>
        <x-smart-text type="text" id="serialInput" name="serial" :value="old('serial', $res_product->serial)" placeholder="Enter Serial" />
    </div>
</div>
                    <div class="{{$decoration['class']['formfooter']}}">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_products.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>