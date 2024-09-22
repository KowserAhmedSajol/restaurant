<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Create ResOrder') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_categoryInput">{{ __('Res_category') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_categorys" name="res_category" :value="old('res_category')"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_productInput">{{ __('Res_product') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_products" name="res_product" :value="old('res_product')"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="order_noInput">{{ __('Order_no') }}</x-smart-label>
        <x-smart-text type="text" id="order_noInput" name="order_no" :value="old('order_no')" placeholder="Enter Order_no" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="order_dateInput">{{ __('Order_date') }}</x-smart-label>
        <x-smart-text type="date" id="order_dateInput" name="order_date" :value="old('order_date')" placeholder="Enter Order_date" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="total_qtyInput">{{ __('Total_qty') }}</x-smart-label>
        <x-smart-text type="number" id="total_qtyInput" name="total_qty" :value="old('total_qty')" placeholder="Enter Total_qty" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="statusInput">{{ __('Status') }}</x-smart-label>
        <x-smart-select id="statusInput" name="status">
    <option value="">{{ __('Select Status') }}</option>
    @foreach($options as $option)
        <option value="{{ $option }}" {{ old('status') == $option ? 'selected' : '' }}>{{ $option }}</option>
    @endforeach
</x-smart-select>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="order_timeInput">{{ __('Order_time') }}</x-smart-label>
        <x-smart-text type="time" id="order_timeInput" name="order_time" :value="old('order_time')" placeholder="Enter Order_time" />
    </div>
</div>
                    <div class="{{$decoration['class']['formfooter']}} mt-2">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_orders.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>