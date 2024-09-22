<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Edit ResBilling') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_billings.update', $res_billing->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_orderInput">{{ __('Res_order') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_orders" name="res_order" :value="old('res_order', $res_billing->res_order)"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="res_tableInput">{{ __('Res_table') }}</x-smart-label>
        <x-smart-selecttrio tableName="res_tables" name="res_table" :value="old('res_table', $res_billing->res_table)"/>
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="statusInput">{{ __('Status') }}</x-smart-label>
        <x-smart-text type="text" id="statusInput" name="status" :value="old('status', $res_billing->status)" placeholder="Enter Status" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="dateInput">{{ __('Date') }}</x-smart-label>
        <x-smart-text type="date" id="dateInput" name="date" :value="old('date')" placeholder="Enter Date" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="timeInput">{{ __('Time') }}</x-smart-label>
        <x-smart-text type="time" id="timeInput" name="time" :value="old('time')" placeholder="Enter Time" />
    </div>
</div>
                    <div class="{{$decoration['class']['formfooter']}}">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_billings.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>