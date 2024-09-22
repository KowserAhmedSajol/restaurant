<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Create ResTax') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_taxes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="nameInput">{{ __('Name') }}</x-smart-label>
        <x-smart-text type="text" id="nameInput" name="name" :value="old('name')" placeholder="Enter Name" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="percentageInput">{{ __('Percentage') }}</x-smart-label>
        <x-smart-text type="text" id="percentageInput" name="percentage" :value="old('percentage')" placeholder="Enter Percentage" />
    </div>
</div><div class="{{$decoration['class']['elementwrapper']}}">
    <div class="{{$decoration['class']['elementcontainer'] }}">
        <x-smart-label for="statusInput">{{ __('Status') }}</x-smart-label>
        <x-smart-text type="yesno" id="statusInput" name="status" :value="old('status')" placeholder="Enter Status" />
    </div>
</div>
                    <div class="{{$decoration['class']['formfooter']}} mt-2">
                        <x-smart-btn-submit />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-list href="{{ route('res_taxes.index') }}" />
        </x-slot>
    </x-smart-card>

    @push('css')
    {{--page-specific-css--}}
    @endpush

    @push('js')
    {{--page-specific-js--}}
    @endpush
</x-smart-master>