<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Edit ResOrderItem') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_order_items.update', $res_order_item->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_orderInput">{{ __('Res_order') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_orders" name="res_order" :value="old('res_order', $res_order_item->res_order)"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_productInput">{{ __('Res_product') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_products" name="res_product" :value="old('res_product', $res_order_item->res_product)"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="qtyInput">{{ __('Qty') }}</x-smart-label>
        <x-smart-text type="number" id="qtyInput" name="qty" :value="old('qty')" placeholder="Enter Qty" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="rateInput">{{ __('Rate') }}</x-smart-label>
        <x-smart-text type="number" id="rateInput" name="rate" :value="old('rate')" placeholder="Enter Rate" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="amountInput">{{ __('Amount') }}</x-smart-label>
        <x-smart-text type="number" id="amountInput" name="amount" :value="old('amount')" placeholder="Enter Amount" />
    </div>
</div>
                    <div class="{{$decoration['class']['formfooter']}}">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_order_items.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>