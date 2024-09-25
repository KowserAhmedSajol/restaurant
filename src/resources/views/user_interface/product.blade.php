<x-smart-master>
    <div class="row">
        <div class="col-md-9">
            <div class="row row-tile no-gutters table-section">

                <!-- Tables will be populated here by AJAX -->
            </div>
            <div class="card mt-3">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title"><b style="font-size: 20px">Products</b></h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="min-height:1000px;">
                    <x-smart-text class="mb-2" type="text" id="qtyInput" name="search" placeholder="Search Product" />
                    <div class="row" id="product-list">
                        @foreach ($resProducts as $key => $resProduct)
                        <div class="col-md-12">
                            <h5 class="card-title product-list-title" data-category="{{ $key }}">
                                <b><u>{{ $key }}</u></b>
                            </h5>
                        </div>
                        @foreach ($resProduct as $product)
                        <div class="col-md-2 productToAdd" style="position: relative;"
                            data-productId="{{ $product->id }}" data-category="{{ $key }}">
                            <div
                                style="position: absolute; top:90px; right:14px; border:1px solid white;  background-color:#F95353; color:white; padding:8px; z-index:500; border-radius:50%;">
                                <b class="price" style="font-size: 10px;">${{ $product->price }}</b>
                            </div>
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:140px;"
                                    src="{{ asset('storage/' . $product->image) }}" alt="">
                                <div class="card-body" style="padding: .75rem;">
                                    <h5 class="card-title search-title" style="margin-bottom: 0; font-size:12px;">
                                        <b>{{ $product->name }}</b>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>



            </div>

        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title"><b style="font-size: 20px">Order Status</b></h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body cart-section-body">
                    <div id="tableoverlay">
                        <div class="table-spinner">
                            <div class="tableloader"></div>
                        </div>
                    </div>
                    <!-- Cart items will be added here dynamically -->
                    <div class="cart-items"></div>

                    <!-- Taxes section -->
                    <hr>
                    <div class="taxes mt-4">
                        @foreach ($resTaxes as $tax)
                        <div class="d-flex justify-content-between align-items-center tax-item"
                            data-percentage="{{ $tax->percentage }}">
                            <p><strong>{{ $tax->name }} ( {{ $tax->percentage }}% ):</strong></p>
                            <span class="vat-amount">$0.00</span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Total Price section -->
                    <div class="total-price mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <p><strong>Total Price:</strong></p>
                            <span class="total-price-amount">$0.00</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary legitRipple" id="confirmOrder"
                            style="width:100%;"><i class="fas fa-check-circle mr-2"></i> Confirm Order</button>
                    </div>
                </div>
            </div>
        </div>


    </div>





    @push('css')
    {{-- page-specific-css --}}
    <style>
        /* HTML: <div class="loader"></div> */
        .cart-section-body {
            position: relative;
        }

        .table-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        #tableoverlay {
            position: absolute;
            top: 5;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            display: none;
            background-color: rgb(255, 255, 255) !important;
            /* opacity: 0.4; */
        }

        .tableloader {
            width: 80px;
            height: 40px;
            border-radius: 0 0 100px 100px;
            border: 5px solid #538a2d;
            border-top: 0;
            box-sizing: border-box;
            background:
                radial-gradient(farthest-side at top, #0000 calc(100% - 5px), #e7ef9d calc(100% - 4px)),
                radial-gradient(2px 3px, #5c4037 89%, #0000) 0 0/17px 12px,
                #ff1643;
            --c: radial-gradient(farthest-side, #000 94%, #0000);
            -webkit-mask:
                linear-gradient(#0000 0 0),
                var(--c) 12px -8px,
                var(--c) 29px -8px,
                var(--c) 45px -6px,
                var(--c) 22px -2px,
                var(--c) 34px 6px,
                var(--c) 21px 6px,
                linear-gradient(#000 0 0);
            mask:
                linear-gradient(#000 0 0),
                var(--c) 12px -8px,
                var(--c) 29px -8px,
                var(--c) 45px -6px,
                var(--c) 22px -2px,
                var(--c) 34px 6px,
                var(--c) 21px 6px,
                linear-gradient(#0000 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude, add, add, add, add, add, add;
            -webkit-mask-repeat: no-repeat;
            animation: l8 3s infinite;
        }

        @keyframes l8 {
            0% {
                -webkit-mask-size: auto, 0 0, 0 0, 0 0, 0 0, 0 0, 0 0
            }

            15% {
                -webkit-mask-size: auto, 20px 20px, 0 0, 0 0, 0 0, 0 0, 0 0
            }

            30% {
                -webkit-mask-size: auto, 20px 20px, 20px 20px, 0 0, 0 0, 0 0, 0 0
            }

            45% {
                -webkit-mask-size: auto, 20px 20px, 20px 20px, 20px 20px, 0 0, 0 0, 0 0
            }

            60% {
                -webkit-mask-size: auto, 20px 20px, 20px 20px, 20px 20px, 20px 20px, 0 0, 0 0
            }

            75% {
                -webkit-mask-size: auto, 20px 20px, 20px 20px, 20px 20px, 20px 20px, 20px 20px, 0 0
            }

            90%,
            100% {
                -webkit-mask-size: auto, 20px 20px, 20px 20px, 20px 20px, 20px 20px, 20px 20px, 20px 20px
            }
        }

        .product-list-title {
            font-size: 24px;
            /* Adjusts the font size */
            font-weight: bold;
            /* Ensures bold text */
            text-decoration: underline;
            /* Underlines the text */
            color: #333;
            /* Changes text color, you can adjust */
            text-align: center;
            /* Centers the text */
            margin: 10px 0;
            /* Adds some spacing around */
            font-family: 'Arial', sans-serif;
            /* Applies a custom font */
        }

        .product-list-title u {
            text-decoration-color: #ff5722;
            /* Custom underline color */
            text-decoration-thickness: 2px;
            /* Makes the underline thicker */
        }

        .product-list-title {
            transition: color 0.3s ease;
            /* Adds a smooth transition effect */
        }

        .product-list-title:hover {
            color: #ff5722;
            /* Changes color on hover */
        }

        .order-item {
            margin-bottom: 10px;
        }

        .total-price {
            font-weight: bold;
            font-size: 18px;
        }

        .disabled {
            background-color: #ff0000 !important;
            /* Black background for disabled button */
            color: white;
            /* White text color for better contrast */
            pointer-events: none;
            /* Prevent interaction */
            opacity: 0.6;
            /* Optional: make it slightly transparent */
        }

        .disabled input {
            display: none;
            /* Hide the radio button */
        }

        .tbl-btn {
            border: 2px solid #ccc;
            /* Change color and thickness as needed */
            border-radius: 4px;
            /* Optional: adds rounded corners */
            transition: border-color 0.3s;
            /* Smooth transition for hover effect */
            background-color: white;
        }

        .tbl-btn:hover {
            /* border-color: #007bff; */
        }

        .tbl-btn.active {
            border-color: #007bff;
            /* Change border color when active */
        }

        input[type="radio"] {
            display: none;

        }

        label.btn.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        label.btn {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Change the appearance when radio is selected */
        input[type="radio"]:checked+label.btn {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .circle-letter {
            display: inline-block;
            width: 40px;
            /* Adjust size as needed */
            height: 40px;
            /* Adjust size as needed */
            border-radius: 50%;
            background-color: #f1f1f1;
            text-align: center;
            line-height: 40px;
            font-size: 18px;
            /* Adjust font size as needed */
            font-weight: bold;
            color: #333;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
    @endpush

    @push('js')
    {{-- page-specific-js --}}
    <script>
        $(document).ready(function() {
            fetchTables();
            $('.productToAdd').on('click', addToCart);
            $('#confirmOrder').on('click', confirmOrder);
            $('.sidebar-control').click();
            $('#qtyInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#product-list .col-md-2').filter(function () {
                    var title = $(this).find('.search-title').text().toLowerCase();
                    $(this).toggle(title.indexOf(value) > -1);
                });
                $('.product-list-title').each(function () {
                    var category = $(this).data('category');
                    if ($('#product-list .col-md-2[data-category="' + category + '"]:visible').length > 0) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $('input[type="radio"]').on('change', function() {
                $('label.btn').removeClass('active'); 
                $(this).parent().addClass(
                'active'); 
            });
        });
        function addToCart() {
            
            const productId = $(this).data('productid'); 
            const productName = $(this).find('.search-title b').text(); 
            const productPrice = parseFloat($(this).find('.price').text().replace('$', '')); 

            let existingCartItem = $('.cart-items').find('.cart-item[data-product-id="' + productId + '"]');
            if (existingCartItem.length) {
                let qtyInput = existingCartItem.find('.qty-input');
                let newQty = parseInt(qtyInput.val()) + 1;
                qtyInput.val(newQty);
            } else {
                let newItem = `
                    <div class="cart-item" data-product-id="${productId}">
                        <div class="order-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0"><strong class="product_name_in_cart" style="font-size: 18px">${productName}</strong></p>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn bg-danger btn-icon rounded-round legitRipple delete-item"><i class="icon-trash"></i></button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-1">
                                <p><strong>Price:</strong> <span class="product-price">$${productPrice.toFixed(2)}</span></p>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn bg-warning btn-icon rounded-round legitRipple qty-minus"><i class="icon-minus3"></i></button>
                                    <input type="text" onChange="updateTotalPrice()" class="form-control qty-input" value="1" min="1"
                                        style="width: 50px; margin: 0 10px;">
                                    <button type="button" class="btn bg-success btn-icon rounded-round legitRipple qty-plus"><i class="icon-plus3"></i></button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                `;
                $('.cart-items').append(newItem);
            }

            updateTotalPrice();
        }

        $(document).on('click', '.delete-item', function() {
            $(this).closest('.cart-item').remove();
            updateTotalPrice(); 
        });

        $(document).on('click', '.qty-plus, .qty-minus', function() {
            let qtyInput = $(this).siblings('.qty-input');
            let currentQty = parseInt(qtyInput.val());

            if ($(this).hasClass('qty-plus')) {
                qtyInput.val(currentQty + 1);
            } else if (currentQty > 1) {
                qtyInput.val(currentQty - 1);
            }

            updateTotalPrice(); 
        });

        function updateTotalPrice() {
            let total = 0;

            
            $('.cart-item').each(function() {
                let price = parseFloat($(this).find('.product-price').text().replace('$', ''));
                let quantity = parseInt($(this).find('.qty-input').val());
                total += price * quantity;
            });
            let totalTaxes = 0;
            $('.tax-item').each(function() {
                let taxPercentage = parseFloat($(this).data('percentage'));
                let taxAmount = (total * taxPercentage) / 100;
                $(this).find('.vat-amount').text(`$${taxAmount.toFixed(2)}`);
                totalTaxes += taxAmount; 
            });
            let finalTotal = total + totalTaxes;

            $('.total-price-amount').text(`$${finalTotal.toFixed(2)}`);
        }
        function confirmOrder() {
            let products = [];
            $("#tableoverlay").fadeIn(300);
            // Loop through each cart item and extract product details
            $('.cart-item').each(function() {
                let productId = $(this).data('product-id');
                let productName = $(this).find('.product_name_in_cart').text();
                let price = parseFloat($(this).find('.product-price').text().replace('$', ''));
                let quantity = parseInt($(this).find('.qty-input').val());
                

                // Create a product object with details and push it to the products array
                products.push({
                    id: productId,
                    name: productName,
                    price: price,
                    quantity: quantity
                });
            });

            // Get the selected table's data-table-id
            let selectedTableId = $('label.tbl-btn.active').data('table-id'); // Assuming the selected table button has 'active' class
            if (!selectedTableId) {
                alert('Please select a table.');
                return;
            }
            if (products.length <= 0) {
                alert('Please add at least one product to your order.');
                return; // Exit the function if no products
            }

            // Send the products and table data to the backend using AJAX POST request
            $.ajax({
                url: '/api/confirm-order', // Your route URL
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Ensure CSRF token is included
                    products: products,
                    table_id: selectedTableId
                },
                success: function(response) {
                    // Empty the cart items
                    $('.cart-items').empty(); // This will remove all cart items from the display

                    // Reset total price display
                    $('.total-price-amount').text('$0.00');

                    // Clear the tax section and reset VAT amounts to $0.00
                    $('.tax-item .vat-amount').text('$0.00'); // Set each VAT amount to $0.00

                    fetchTables();
                    $("#tableoverlay").fadeOut(300);
                },
                error: function(error) {
                    console.error("Error in submitting order:", error);
                    $("#tableoverlay").fadeOut(300);
                }
            });
        }
        $(document).on('click', '.tbl-btn:not(.disabled)', function () {
            // Remove 'active' class from all buttons
            $('.tbl-btn').removeClass('active');
            // Add 'active' class to the clicked button
            $(this).addClass('active');
        });
        function fetchTables() {
            $.ajax({
                url: '/api/tables', // Your API route
                method: 'GET',
                success: function(tables) {
                    // Populate the table section
                    let tableSection = $('.table-section');
                    tableSection.empty(); // Clear any existing tables

                    tables.forEach(function(table) {
                        let tableHtml = `
                            <div class="col-2">
                                <label class="btn tbl-btn btn-block btn-float m-0 legitRipple ${table.is_occupied ? 'disabled' : ''}" data-table-id="${table.id}">
                                    <input type="radio" name="options" id="table${table.id}" autocomplete="off">
                                    <div class="circle-letter"></div>
                                    <span>${table.name}</span>
                                </label>
                            </div>
                        `;
                        tableSection.append(tableHtml);
                    });

                    // After appending new elements, update the circle letters
                    $('.btn-float').each(function() {
                        var spanText = $(this).find('span').text().trim();
                        var firstLetters = spanText.split(' ').map(word => word.charAt(0)).join('');
                        $(this).find('.circle-letter').text(firstLetters);
                    });
                },
                error: function(error) {
                    console.error("Error fetching tables:", error);
                }
            });
        }


    </script>
    @endpush
</x-smart-master>