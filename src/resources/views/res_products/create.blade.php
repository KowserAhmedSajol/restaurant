<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
            {{ __('Create ResProduct') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-errors :errors="$errors" />
            <form action="{{ route('res_products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Dynamic Fields -->
                    <div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer']}}">
                            <x-smart-label for="res_categoryInput">{{ __('Res_category') }}</x-smart-label>
                            <x-smart-selecttrio tableName="res_categories" name="res_category"
                                :value="old('res_category')" id="res_categoryInput" />
                        </div>
                    </div>
                    <div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer']}}">
                            <x-smart-label for="nameInput">{{ __('Name') }}</x-smart-label>
                            <x-smart-text type="text" id="nameInput" name="name" :value="old('name')"
                                placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer']}}">
                            <x-smart-label for="priceInput">{{ __('Price') }}</x-smart-label>
                            <x-smart-text type="text" id="priceInput" name="price" :value="old('price')"
                                placeholder="Enter Price" />
                        </div>
                    </div>
                    
                    <div class="{{$decoration['class']['elementwrapper']}}">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="imageInput">{{ __('Image') }}</x-smart-label>
                            <x-smart-text type="file" id="imageInput" name="image" :value="old('image')"
                                placeholder="Enter Image" />
                        </div>
                    </div>
                    <div class="{{$decoration['class']['elementwrapper']}} d-none">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="statusInput">{{ __('Status') }}</x-smart-label>
                            <x-smart-text type="hidden" id="statusInput" name="status" :value="1"
                                placeholder="Enter Status" />
                        </div>
                    </div>
                    <div class="{{$decoration['class']['elementwrapper']}} d-none">
                        <div class="{{$decoration['class']['elementcontainer'] }}">
                            <x-smart-label for="serialInput">{{ __('Serial') }}</x-smart-label>
                            <x-smart-text type="hidden" id="serialInput" name="serial" :value="1"
                                placeholder="Enter Serial" />
                        </div>
                    </div>

                    <!-- Hidden Table -->
                    <div class="col-12 mt-4 d-none" id="extraTableWrapper">
                        <table class="table table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th style="width:50%;">Product</th>
                                    <th style="width:10%;">Qty</th>
                                    <th>Price</th>
                                    <th style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="combo_res_product[]" class="form-select product-select">
                                            <option value="">Select a product</option> <!-- Placeholder option -->
                                            @foreach($res_products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" name="combo_item_qty[]" value="1" class="form-control price-qty text-center"  /></td>
                                    <td><input type="text" name="combo_item_price[]" class="form-control price-input text-right"  /></td>
                                    <td>
                                        <button type="button" class="mr-2 btn btn-outline bg-success border-success text-success-800 btn-icon border-2 legitRipple add-row-button">
                                            <i class="icon-plus3"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 legitRipple remove-row-button">
                                            <i class="icon-minus3"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="{{$decoration['class']['formfooter']}} mt-2">
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
    {{-- page-specific-css --}}
    @endpush

    @push('js')
    {{-- page-specific-js --}}
    <script>
        $(document).ready(function() {
            $('.add-row-button').on('click', addNewRow);
            $('#productTable').on('click', '.remove-row-button', function() {
                $(this).closest('tr').remove(); 
                adjustPrice();
            });
            $('#res_categoryInput').on('change', toggleExtraTable);
            $('.product-select').on('change', updatePrice);
            $('.price-qty').on('change', adjustTrPrice);
            $('#productTable').on('input', '.price-input', adjustPrice);
        });
        function adjustTrPrice() {
            
            // Find the closest row to the changed quantity input
            var $row = $(this).closest('tr');

            // Get the selected product from the corresponding select element
            var selectedProduct = $row.find('.product-select option:selected');

            // Get the price from the selected option
            var productPrice = parseFloat(selectedProduct.data('price')) || 0;

            // Get the quantity input value
            var quantity = parseInt($(this).val()) || 0;

            // Calculate the total price
            var totalPrice = productPrice * quantity;

            // Set the total price in the price input field
            $row.find('.price-input').val(totalPrice); // Set to 2 decimal places
            adjustPrice();
        }
        function adjustPrice() {
            let total = 0;

            // Iterate through each price input and sum their values
            $('.price-input').each(function() {
                let priceValue = parseFloat($(this).val()); // Get the value and convert to a number
                if (!isNaN(priceValue)) {
                    total += priceValue; // Add to total if it's a valid number
                }
            });
            
            // Set the total to the priceInput field
            $('#priceInput').val(total); // Format the total to 2 decimal places
        }
        function updatePrice() {
            var selectedOption = $(this).find('option:selected');
            var price = selectedOption.data('price');
            // console.log(price);
            $(this).closest('tr').find('.price-input').val(price);
            adjustPrice();
        }

        function toggleExtraTable() {
            var selectedValue = $(this).find("option:selected").text();
            if (selectedValue === 'Combo') {
                $('#extraTableWrapper').removeClass('d-none');
            } else {
                $('#extraTableWrapper').addClass('d-none');
            }
        }

        function addNewRow() {
            var newRow = `
                <tr>
                    <td>
                        <select data-placeholder="Select a Product" name="combo_res_product[]" class="form-select product-select">
                            <option value="">Select a product</option> <!-- Placeholder option -->
                            @foreach($res_products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="combo_item_qty[]" value="1" class="form-control price-qty text-center"  /></td>
                    <td><input type="text" name="combo_item_price[]" class="form-control price-input text-right" /></td>
                    <td>
                        <button type="button" class="mr-2 btn btn-outline bg-success border-success text-success-800 btn-icon border-2 legitRipple add-row-button">
                            <i class="icon-plus3"></i>
                        </button>
                        <button type="button" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 legitRipple remove-row-button">
                            <i class="icon-minus3"></i>
                        </button>
                    </td>
                </tr>
            `;

            $('#productTable tbody').append(newRow);
            $('.product-select').select2();
            $('.product-select').on('change', updatePrice);
            $('#productTable').on('input', 'input[name="price"]', adjustPrice);
            $('.price-qty').on('change', adjustTrPrice);
            // $('.add-row-button').on('click', addNewRow);
        }
    </script>
    @endpush
</x-smart-master>
