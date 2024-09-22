<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Edit ResTable') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_tables.update', $res_table->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="nameInput">{{ __('Name') }}</x-smart-label>
        <x-smart-text type="text" id="nameInput" name="name" :value="old('name', $res_table->name)" placeholder="Enter Name" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="capacityInput">{{ __('Capacity') }}</x-smart-label>
        <x-smart-text type="number" id="capacityInput" name="capacity" :value="old('capacity')" placeholder="Enter Capacity" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="statusInput">{{ __('Status') }}</x-smart-label>
        <x-smart-text type="yesno" id="statusInput" name="status" :value="old('status')" placeholder="Enter Status" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="colorInput">{{ __('Color') }}</x-smart-label>
        <x-smart-text type="text" id="colorInput" name="color" :value="old('color', $res_table->color)" placeholder="Enter Color" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="is_occupiedInput">{{ __('Is_occupied') }}</x-smart-label>
        <x-smart-text type="yesno" id="is_occupiedInput" name="is_occupied" :value="old('is_occupied')" placeholder="Enter Is_occupied" />
    </div>
</div>
                    <div class="{{$decoration['class']['formfooter']}}">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_tables.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>