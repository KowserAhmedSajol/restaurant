<x-smart-master>
    <div class="row">
        <div class="col-sm-6 col-xl-2">
            <div class="card card-body bg-blue-400 has-bg-image" style="position: relative; overflow: hidden;">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0" style="font-weight:bold;" id="totalOrders">0</h3>
                        <span class="text-uppercase font-size-xs">total orders</span>
                    </div>

                    <div class="image-container"
                        style="position: absolute; bottom: 0; right: 0; transform: translate(20%, 20%) rotate(-45deg);">
                        <img src="https://cdn-icons-png.flaticon.com/512/2649/2649223.png" alt="Total Bills"
                            class="icon-3x" style="opacity: 0.75; width: 3em; height: 3em;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-2">
            <div class="card card-body has-bg-image" style="position: relative; overflow: hidden; background-color: #26a69a;">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0" id="totalBills" style="font-weight:bold;">0</h3>
                        <span class="text-uppercase font-size-xs">total bills</span>
                    </div>
                </div>

                <div class="image-container"
                    style="position: absolute; bottom: 0; right: 0; transform: translate(30%, 30%) rotate(-45deg);">
                    <img src="https://static.thenounproject.com/png/3263003-200.png" alt="Total Bills" class="icon-3x"
                        style="opacity: 0.75; width: 3em; height: 3em;">
                </div>
            </div>
        </div>
        

        <div class="col-sm-6 col-xl-2">
            <div class="card card-body bg-orange-400 has-bg-image" style="position: relative; overflow: hidden;">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0" id="totalPaidBills" style="font-weight:bold;">0</h3>
                        <span class="text-uppercase font-size-xs">total paid bills</span>
                    </div>
                </div>

                <div class="image-container"
                    style="position: absolute; bottom: 0; right: 0; transform: translate(20%, 20%) rotate(-45deg);">
                    <img src="https://cdn-icons-png.freepik.com/512/4272/4272841.png" alt="Total Bills" class="icon-3x"
                        style="opacity: 0.75; width: 3em; height: 3em;">
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-2">
            <div class="card card-body bg-blue-400 has-bg-image" style="position: relative; overflow: hidden;">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0" id="totalUnpaidBills" style="font-weight:bold;">0</h3>
                        <span class="text-uppercase font-size-xs">total unpaid bills</span>
                    </div>

                    <div class="image-container"
                        style="position: absolute; bottom: 0; right: 0; transform: translate(20%, 20%) rotate(-45deg);">
                        <img src="https://cdn2.iconfinder.com/data/icons/prohibited-forbidden-signs/100/Prohibited-05-512.png" alt="Total Bills"
                            class="icon-3x" style="opacity: 0.75; width: 3em; height: 3em;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-2">
            <div class="card card-body bg-success-400 has-bg-image" style="position: relative; overflow: hidden;">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0" id="totalAmountSold" style="font-weight:bold;">0</h3>
                        <span class="text-uppercase font-size-xs">total amount sold</span>
                    </div>
                </div>

                <div class="image-container"
                    style="position: absolute; bottom: 0; right: 0; transform: translate(30%, 30%) rotate(-45deg);">
                    <img src="https://cdn-icons-png.flaticon.com/512/10384/10384161.png" alt="Total Bills" class="icon-3x"
                        style="opacity: 0.75; width: 3em; height: 3em;">
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-2">
            <div class="card card-body bg-info-400 has-bg-image" style="position: relative; overflow: hidden;">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0" id="availableTables" style="font-weight:bold;">0</h3>
                        <span class="text-uppercase font-size-xs">available tables</span>
                    </div>

                    <div class="image-container"
                        style="position: absolute; bottom: 0; right: 0; transform: translate(20%, 20%) rotate(-45deg);">
                        <img src="https://cdn-icons-png.flaticon.com/512/1663/1663945.png" alt="Total Bills"
                            class="icon-3x" style="opacity: 0.75; width: 2em; height: 2em;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <div class="row row-tile no-gutters table-section">

                <!-- Tables will be populated here by AJAX -->
            </div>
        </div>
        <div class="col-md-11">

            <div class=" card card-body">
                <ul class="nav nav-tabs nav-tabs-solid nav-justified border-0">
                    <li class="nav-item"><a href="#solid-justified-tab1" class="nav-link active" data-toggle="tab">Order
                            Section</a></li>
                    <li class="nav-item"><a href="#solid-justified-tab2" class="nav-link" data-toggle="tab">Payment
                            Section</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="solid-justified-tab1">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h6 class="card-title"><b style="font-size: 20px">Products</b></h6>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="min-height:1000px;">
                                        <x-smart-text class="mb-2" type="text" id="qtyInput" name="search"
                                            placeholder="Search Product" />
                                        <div class="row" id="product-list">
                                            @foreach ($products as $key => $resProduct)
                                            <div class="col-md-12">
                                                <h5 class="card-title product-list-title" data-category="{{ $key }}">
                                                    <b><u>{{ $key }}</u></b>
                                                </h5>
                                            </div>
                                            @foreach ($resProduct as $product)
                                            <div class="col-md-2 productToAdd" style="position: relative;"
                                                data-productId="{{ $product->id }}" data-category="{{ $key }}">
                                                <div
                                                    style="position: absolute; top:90px; right:14px; border:1px solid white;  background-color:#F95353; color:white; padding:8px; z-index:500; border-radius:50%; cursor:pointer;">
                                                    <b class="price" style="font-size: 10px;">${{ $product->price }}</b>
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" style="height:140px; cursor:pointer;"
                                                        src="{{ asset('storage/' . $product->image) }}" alt="">
                                                    <div class="card-body" style="padding: .75rem; cursor:pointer;">
                                                        <h5 class="card-title search-title"
                                                            style="margin-bottom: 0; font-size:12px;">
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
                                        <img 
                                            id="sampleImgOnCart"
                                            src="https://media.istockphoto.com/id/1479739680/vector/customer-and-waiter-in-restaurant-cartoon-vector.jpg?s=612x612&w=0&k=20&c=f_TbSMXDKqc9oDMNXeYDWzmB509e4oGcLCiVWKVndE8="
                                            alt=""
                                            style="width:100%;"
                                            >
                                        <div id="tableoverlay">
                                            <div class="table-spinner">
                                                <div class="tableloader"></div>
                                            </div>
                                        </div>
                                        <!-- Cart items will be added here dynamically -->
                                        <div class="cart-items"></div>

                                        <!-- Taxes section -->
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
                                            <button type="button" class="btn legitRipple" id="confirmOrder"
                                                style="width:100%; background-color:#26A69A; color:white;"><i class="fas fa-check-circle mr-2"></i> Confirm
                                                Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="solid-justified-tab2">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- Style combinations -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h5 class="card-title"><b>Orders</b></h5>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <table class="table datatable-basic table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Order Name</th>
                                                    <th>Token Number</th>
                                                    <th>Table</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Qty</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    {{-- <th class="text-center">Actions</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody id="orderTbody">
                                                @foreach ($resOrders as $order)
                                                <tr style="cursor:pointer;" class="order-row"
                                                    data-id="{{ $order->id }}">
                                                    <td class="text-center">{{ $order->order_no }}</td>
                                                    <td class="text-center">{{ $order->token_no }}</td>
                                                    <td class="text-center">{{ $order->res_table_title }}</td>
                                                    <td class="text-center">{{ $order->order_date }}</td>
                                                    <td class="text-center">{{ $order->order_time }}</td>
                                                    <td class="text-center total_qty">{{ $order->total_qty }}</td>
                                                    <td class="text-right total_amount">${{ $order->total_amount }}</td>
                                                    <td class="text-center">
                                                        <span class="badge 
                                                            @if($order->status === 'Completed') badge-primary 
                                                            @elseif($order->status === 'Pending') badge-warning 
                                                            @elseif($order->status === 'Canceled') badge-danger 
                                                            @elseif($order->status === 'Paid') badge-success 
                                                            @elseif($order->status === 'Ordered') badge-info 
                                                            @endif">
                                                            {{ $order->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /style combinations -->
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h5 class="card-title"><b>Order Items</b></h5>
                                        <div class="header-elements">
                                            <input type="hidden" id="orderIdOnOrderItemCard">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body order-item-body" style="min-height:600px;">
                                        <div id="tableoverlay">
                                            <div class="table-spinner">
                                                <div class="tableloader"></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10%;">#</th>
                                                        <th style="width:40%;">Product Title</th>
                                                        <th style="width:20%;">Qty</th>
                                                        <th style="width:10%;">Rate</th>
                                                        <th style="width:20%;">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="orderTableBody">
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            Select An Order
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="text-center mb-2"
                                        style="width: 98%; margin: auto; display: flex; justify-content: space-between;">
                                        <button type="button" class="btn btn-info legitRipple" id="updateOrder"
                                            style="flex: 1; margin-right: 5px;">
                                            <i class="icon-pen-plus mr-2"></i> Update Order
                                        </button>
                                        <button type="button" class="btn btn-success legitRipple" id="orderPayment"
                                            style="flex: 1; margin-left: 5px;">
                                            <i class="icon-credit-card2 mr-2"></i> Proceed To Payment
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



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
            $('#sampleImgOnCart').hide();
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
                if ($('.cart-item').length === 0) {
                    // If no cart items, show the image
                    $('#sampleImgOnCart').show();
                } else {
                    // If there are cart items, hide the image
                    $('#sampleImgOnCart').hide();
                }

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
            let selectedTableId = $('label.tbl-btn.active').data('table-id'); 
            if (!selectedTableId) {
                alert('Please select a table.');
                $("#tableoverlay").fadeOut(300);
                return;
            }
            let products = [];
            $("#tableoverlay").fadeIn(300);
            $('.cart-item').each(function() {
                let productId = $(this).data('product-id');
                let productName = $(this).find('.product_name_in_cart').text();
                let price = parseFloat($(this).find('.product-price').text().replace('$', ''));
                let quantity = parseInt($(this).find('.qty-input').val());
                products.push({
                    id: productId,
                    name: productName,
                    price: price,
                    quantity: quantity
                });
            });
            if (products.length <= 0) {
                alert('Please add at least one product to your order.');
                $("#tableoverlay").fadeOut(300);
                return; 
            }
            $.ajax({
                url: '/api/confirm-order',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    products: products,
                    table_id: selectedTableId
                },
                success: function(response) {
                    $('.cart-items').empty();
                    $('.total-price-amount').text('$0.00');
                    $('.tax-item .vat-amount').text('$0.00');
                    fetchTables();
                    if (response.data) {
                        prependOrderRowTbodyData(response.data);
                    }
                    $('.order-row').on('click', orderRowClick);
                    $('#orderTbody tr').first().click();
                    $("#tableoverlay").fadeOut(300);
                    getTotalOrders();
                    getTotalBills();
                    getTotalUnpaidBills();
                    getTotalAvailableTables();
                    
                    $('#sampleImgOnCart').show();
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
                            <div class="col-12">
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

        function prependOrderRowTbodyData(order) {
            let row = `
                <tr style="cursor:pointer;" class="order-row" data-id="${order.id}">
                    <td class="text-center">${order.order_no}</td>
                    <td class="text-center">${order.token_no}</td>
                    <td class="text-center">${order.res_table_title}</td>
                    <td class="text-center">${order.order_date}</td>
                    <td class="text-center">${order.order_time}</td>
                    <td class="text-center total_qty">${order.total_qty}</td>
                    <td class="text-right total_amount">$${order.total_amount}</td>
                    <td class="text-center">
                        <span class="badge ${
                            order.status === 'Completed' ? 'badge-primary' :
                            order.status === 'Pending' ? 'badge-warning' :
                            order.status === 'Canceled' ? 'badge-danger' :
                            order.status === 'Paid' ? 'badge-success' :
                            order.status === 'Ordered' ? 'badge-info' : ''
                        }">${order.status}</span>
                    </td>
                </tr>
            `;

            // Prepend the row to your table body
            $('#orderTbody').prepend(row);
        }

    </script>


    <script>
        let globalResTaxes; 

        $(document).ready(function() {

            getTotalOrders();
            getTotalBills();
            getTotalPaidBills();
            getTotalUnpaidBills();
            getTotalAvailableTables();
            getTotalAmountSold();



            $('#updateOrder').on('click', updateOrder);
            $('#orderPayment').on('click', orderPayment);
            $('.order-row').on('click', orderRowClick);
            $(document).on('click', '.add-row-button', function() {
                addNewRow();
            });
            $(document).on('click', '.remove-row-button', function() {
                $(this).closest('tr').remove(); 
                updateTotals(globalResTaxes); 
            });
        });

        function getTotalAmountSold() {
            $.ajax({
                url: '/api/get-total-amount-sold',  // This is the endpoint for the GET request
                method: 'GET',             // GET request method
                success: function(response) {
                    $('#totalAmountSold').text('$' + response.totalAmountSold.toFixed(2));
                },
                error: function(error) {
                    console.error("Error fetching total orders:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }

        function getTotalAvailableTables() {
            $.ajax({
                url: '/api/get-total-available-tables',  // This is the endpoint for the GET request
                method: 'GET',             // GET request method
                success: function(response) {
                    $('#availableTables').text(response.availableTables);
                },
                error: function(error) {
                    console.error("Error fetching total orders:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }

        function getTotalPaidBills() {
            $.ajax({
                url: '/api/get-total-paid-bills',  // This is the endpoint for the GET request
                method: 'GET',             // GET request method
                success: function(response) {
                    $('#totalPaidBills').text(response.totalPaidBills);
                },
                error: function(error) {
                    console.error("Error fetching total orders:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }

        function getTotalUnpaidBills() {
            $.ajax({
                url: '/api/get-total-unpaid-bills',  // This is the endpoint for the GET request
                method: 'GET',             // GET request method
                success: function(response) {
                    $('#totalUnpaidBills').text(response.totalUnpaidBills);
                },
                error: function(error) {
                    console.error("Error fetching total orders:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }

        function getTotalBills() {
            $.ajax({
                url: '/api/get-total-bills',  // This is the endpoint for the GET request
                method: 'GET',             // GET request method
                success: function(response) {
                    // Assuming the response contains 'totalOrders'
                    $('#totalBills').text(response.totalBills);
                },
                error: function(error) {
                    console.error("Error fetching total orders:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }
        function getTotalOrders() {
            $.ajax({
                url: '/api/get-total-orders',  // This is the endpoint for the GET request
                method: 'GET',             // GET request method
                success: function(response) {
                    // Assuming the response contains 'totalOrders'
                    $('#totalOrders').text(response.totalOrders);
                },
                error: function(error) {
                    console.error("Error fetching total orders:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }

        function orderRowClick() {
            $('.order-row').removeClass('active-row');
            $(this).addClass('active-row');
            let orderId = $(this).data('id');
            loadOrderItem(orderId);
        }

        function orderPayment() {
                // Get payment method data
                let paymentData = {
                    paymentMethod: $('.paymentMethod').val(), 
                    receivedAmount: $('.receivedAmount').val(), 
                    transactionId: $('.transactionId').val(), 
                    phoneNumber: $('.phoneNumber').val(), 
                    returnAmount: parseFloat($('.returnAmount').html().replace(/[^0-9.-]+/g, ''))
                };

                if (parseFloat(paymentData.returnAmount) < 0) {
                    alert('Return amount cannot be negative.');
                    return; 
                }

                // Validation: Check if receivedAmount is empty
                if (!paymentData.receivedAmount || isNaN(paymentData.receivedAmount) || parseFloat(paymentData.receivedAmount) <= 0) {
                    alert('Received amount must be a valid number greater than zero.');
                    return; 
                }
                let orderItems = []; 
                $('#orderTableBody tr').each(function() {
                    let orderItemId = $(this).data('orderitemid');
                    let qty = $(this).find('.qty-input').val();
                    let amount = $(this).find('.amount').text().replace('$', '').trim(); 
                    if (orderItemId === 0) {
                        let selectedProduct = $(this).find('.product-select').val();
                        if (selectedProduct) {       
                            let orderItem = {
                                id: orderItemId, // Still 0, as it's a new row
                                productId: selectedProduct, // Get selected product ID or value
                                quantity: qty,
                                amount: parseFloat(amount) // Convert amount to a float
                            };
                            orderItems.push(orderItem);
                        }
                    }
                    // Otherwise, handle rows with defined orderItemId
                    else if (orderItemId !== undefined) {
                        let orderItem = {
                            id: orderItemId,
                            quantity: qty,
                            amount: parseFloat(amount) // Convert amount to a float
                        };
                        orderItems.push(orderItem);
                    }
                });
                
                $.ajax({
                url: '/api/order-payment',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    orderId: $('#orderIdOnOrderItemCard').val(),
                    orderItems: orderItems,
                    paymentData: paymentData ,
                },
                success: function(response) {
                    let orderRow = $(`#orderTbody .order-row[data-id='${response.orderId}']`);
                    let statusBadge = orderRow.find('.badge');
                    statusBadge.text(response.status);
                    orderRow.find('.total_qty').text(response.total_qty);
                    orderRow.find('.total_amount').text(`$${parseFloat(response.total_amount).toFixed(2)}`);
                    if (response.status === 'Completed') {
                        statusBadge.removeClass('badge-info badge-warning badge-danger badge-success')
                                .addClass('badge-primary');
                    } else if (response.status === 'Pending') {
                        statusBadge.removeClass('badge-primary badge-danger badge-info badge-success')
                                .addClass('badge-warning');
                    } else if (response.status === 'Canceled') {
                        statusBadge.removeClass('badge-primary badge-warning badge-info badge-success')
                                .addClass('badge-danger');
                    } else if (response.status === 'Paid') {
                        statusBadge.removeClass('badge-primary badge-warning badge-danger badge-info')
                                .addClass('badge-success');
                    } else if (response.status === 'Ordered') {
                        statusBadge.removeClass('badge-primary badge-warning badge-danger badge-success')
                                .addClass('badge-info');
                    }
                    loadOrderItem(response.orderId);
                    fetchTables();

                    getTotalOrders();
                    getTotalBills();
                    getTotalPaidBills();
                    getTotalUnpaidBills();
                    getTotalAvailableTables();
                    getTotalAmountSold();
                },
                error: function(error) {
                    console.error("Error in submitting order:", error);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An unexpected error occurred. Please try again later.');
                    }
                }
            });
        }

        function updateOrder() {
                let orderItems = []; 

                $('#orderTableBody tr').each(function() {
                    let orderItemId = $(this).data('orderitemid');
                    let qty = $(this).find('.qty-input').val();
                    let amount = $(this).find('.amount').text().replace('$', '').trim(); 

                    
                    if (orderItemId === 0) {
                        let selectedProduct = $(this).find('.product-select').val();
                        if (selectedProduct) {
                            
                            let orderItem = {
                                id: orderItemId, // Still 0, as it's a new row
                                productId: selectedProduct, // Get selected product ID or value
                                quantity: qty,
                                amount: parseFloat(amount) // Convert amount to a float
                            };

                            orderItems.push(orderItem);
                        }
                    }
                    // Otherwise, handle rows with defined orderItemId
                    else if (orderItemId !== undefined) {
                        let orderItem = {
                            id: orderItemId,
                            quantity: qty,
                            amount: parseFloat(amount) // Convert amount to a float
                        };

                        orderItems.push(orderItem);
                    }
                });

                $.ajax({
                url: '/api/update-order-item',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    orderId: $('#orderIdOnOrderItemCard').val(),
                    orderItems: orderItems,
                },
                success: function(response) {
                    let orderRow = $(`#orderTbody .order-row[data-id='${response.orderId}']`);
                
                    // Update total quantity and total amount in the corresponding row
                    orderRow.find('.total_qty').text(response.total_qty);
                    orderRow.find('.total_amount').text(`$${parseFloat(response.total_amount).toFixed(2)}`);

                    loadOrderItem(response.orderId)
                },
                error: function(error) {
                    console.error("Error in submitting order:", error);
                }
            });
        }

        // Function to load order items
        function loadOrderItem(orderId) {
            $('#orderIdOnOrderItemCard').val(orderId);
            $.ajax({
                url: '/api/load-order-item',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    orderId: orderId,
                },
                success: function(response) {
                    globalResTaxes = response.resTaxes; // Store the taxes globally
                    let orderTableBody = $('#orderTableBody');
                    orderTableBody.empty();
                    orderTableBody.find('tr.extraNewRow').remove(); // Clear any existing new rows

                    // Populate the order items
                    $.each(response.data, function(index, item) {

                        
                        let row = `
                            <tr data-orderItemId="${item.id}">
                                <td>${index + 1}</td>
                                <td>${item.res_product_title}</td>
                                <td class="text-center">
                                    <input type="number" class="form-control qty-input" value="${item.qty}" min="1" style="text-align: center;">
                                </td>
                                <td class="text-right rate-text">$${parseFloat(item.rate).toFixed(2)}</td>
                                <td class="text-right amount">$${parseFloat(item.amount).toFixed(2)}</td>
                            </tr>
                        `;
                        orderTableBody.append(row);
                    });
                    // Add extra row for adding new products
                    orderTableBody.append(extraRowHtml());


                    // Calculate and update totals and taxes
                    updateTotals(globalResTaxes); // Call with the global tax data

                    // Attach event listeners for quantity inputs
                    orderTableBody.on('change', '.qty-input', function() {
                        updateRowTotal($(this).closest('tr')); // Update individual row total
                        updateTotals(globalResTaxes); // Update overall totals with tax data
                    });

                    // Attach change event listener to product selects
                    orderTableBody.on('change', '.product-select', function() {
                        let selectedOption = $(this).find('option:selected');
                        let price = parseFloat(selectedOption.data('price')) || 0;
                        let quantity = parseInt($(this).closest('tr').find('.qty-input').val()) || 0;

                        $(this).closest('tr').find('.rate-text').text(price.toFixed(2));
                        updateRowTotal($(this).closest('tr')); // Update row total
                        updateTotals(globalResTaxes); // Update overall totals with tax data
                    });
                    row = `
                            <tr class="text-center" id="payment">
                                <td colspan="3">
                                    <b>Select Payment Type</b>
                                </td>
                                <td colspan="2">
                                    <b>Received Amount</b>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="3">
                                    <select class="form-control paymentMethod" name="">
                                        <option value="Cash">Cash</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </td>
                                <td colspan="2">
                                    <input type="text" class="form-control receivedAmount" value="" min="1" style="text-align: right;">
                                </td>
                            </tr>

                            <tr class="text-center transaction-row" style="display: none;">
                                <td colspan="3">
                                    <input type="text" class="form-control transactionId" placeholder="Enter Transaction ID" value="" min="1" style="text-align: right;">
                                </td>
                                <td colspan="2">
                                    <input type="text" class="form-control phoneNumber" placeholder="Enter Phone Number" value="" min="1" style="text-align: right;">
                                </td>
                            </tr>
                            <tr class="text-right">
                                <td colspan="3">
                                    <b>Return Amount</b>
                                </td>
                                <td colspan="2" class="returnAmount">
                                    $ 0.00
                                </td>
                            </tr>
                        `;
                    orderTableBody.append(row);
                    $('select').select2();

                    $(document).on('input', '.receivedAmount', function() {
                        let receivedAmount = parseFloat($(this).val()) || 0;
                        let totalAmount = parseFloat($('.total-amount-row td:last').text().replace('$', ''));
                        let returnAmount = receivedAmount - totalAmount;
                        $('.returnAmount').text(`$ ${returnAmount.toFixed(2)}`);
                    });
                    $('.paymentMethod').on('change', handlePaymentMethodChange);
                },
                error: function(error) {
                    console.error("Error in submitting order:", error);
                }
            });
        }

        function handlePaymentMethodChange() {
            let selectedPayment = $(this).val();

            // Check if Bkash or Card is selected
            if (selectedPayment === 'Bkash' || selectedPayment === 'Card') {
                // Show the row with transactionId and phoneNumber
                $('.transaction-row').show();
            } else {
                // Hide the row if any other option is selected
                $('.transaction-row').hide();
            }
        }

        // Function to add a new row
        function addNewRow() {
            let newRow = `
                <tr class='extraNewRow' data-orderItemId="0">
                    <td>
                        <button type="button" class="btn btn-outline bg-danger border-danger text-danger-800 btn-icon border-2 legitRipple remove-row-button">
                            <i class="icon-minus3"></i>
                        </button>
                    </td>
                    <td>
                        <select data-placeholder="Select Product" class="form-control product-select" name="res_category">
                            <option></option>
                            @foreach ($resProducts as $product)
                                <option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-center">
                        <input type="number" class="form-control qty-input" value="1" min="1" style="text-align: center;">
                    </td>
                    <td class="text-right">$<span class="rate-text" placeholder="Rate">0.00</span></td>
                    <td class="text-right">$<span class="amount">0.00</span></td>
                </tr>
            `;
            $('.extra-row').after(newRow);
            $('select').select2();
            
            // Attach change event listeners for the new row
            attachNewRowListeners($('.extraNewRow').last());
        }

        // Function to attach listeners to a new row
        function attachNewRowListeners(row) {
            row.find('.product-select').on('change', function() {
                let selectedOption = $(this).find('option:selected');
                let price = parseFloat(selectedOption.data('price')) || 0;
                let quantity = parseInt(row.find('.qty-input').val()) || 0;

                row.find('.rate-text').text(price.toFixed(2));
                updateRowTotal(row); // Update individual row total
            });

            row.find('.qty-input').on('change', function() {
                updateRowTotal(row); // Update individual row total
            });
        }

        // Function to update individual row total
        function updateRowTotal(row) {
            let price = parseFloat(row.find('.rate-text').text().replace('$', '')) || 0; // Remove $ sign
            let quantity = parseInt(row.find('.qty-input').val()) || 0;
            let amount = price * quantity;

            row.find('.amount').text(`$${amount.toFixed(2)}`); // Update the amount text
        }

        // Function to update totals and taxes
        function updateTotals(resTaxes) {
            let totalAmount = 0;
            let totalTaxAmount = 0;

            $('#orderTableBody').find('tr').each(function() {
                // Check if the row is an item row (not tax row)
                if (!$(this).hasClass('tax-row')) {
                    const qty = parseInt($(this).find('.qty-input').val()) || 0;
                    let rateText = $(this).find('.rate-text').text(); // Get the rate text
                    let rate = parseFloat(rateText.replace('$', '').replace(',', '').trim()) || 0;

                    const amount = qty * rate;
                    totalAmount += amount;
                    $(this).find('.amount').text(`${amount.toFixed(2)}`); // Ensure amount is displayed
                }
            });

            // Clear existing tax rows
            $('#orderTableBody').find('.tax-row').remove();

            $.each(resTaxes, function(index, item) {
                let taxAmount = (item.percentage / 100) * totalAmount;
                totalTaxAmount += taxAmount;

                let taxRow = `
                    <tr class="tax-row">
                        <td class="text-right" colspan="4">${item.name} [ ${item.percentage}% ]</td>
                        <td class="text-right">$${taxAmount.toFixed(2)}</td>
                    </tr>
                `;
                // $('#orderTableBody').append(taxRow);
                // $('.payment').first().before(taxRow);
                if ($('#payment').length) {
                $('#payment').before(taxRow);
            } else {
                $('#orderTableBody').append(taxRow);
            }
            });

            let grandTotal = totalAmount + totalTaxAmount;
            $('#orderTableBody').find('.total-amount-row').remove();

            let totalAmountRow = `
                <tr class="total-amount-row">
                    <td class="text-right" colspan="4"><strong>Total Amount (Items + Taxes)</strong></td>
                    <td class="text-right" style="font-weight:bold;">$${grandTotal.toFixed(2)}</td>
                </tr>
            `;
            if ($('#payment').length) {
                $('#payment').before(totalAmountRow);
            } else {
                $('#orderTableBody').append(totalAmountRow);
            }
        }

        // Function to create extra row HTML for adding new products
        function extraRowHtml() {
            return `
                <tr class="extra-row">
                    <td colspan="5" class="text-right">
                        <button type="button" class="btn btn-outline bg-success border-success text-success-800 btn-icon border-2 legitRipple add-row-button">
                            <i class="icon-plus3"></i>
                        </button>
                    </td>
                </tr>
            `;
        }
    </script>
    @endpush






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
            /* text-align: center; */
            /* Centers the text */
            margin: 10px 0;
            /* Adds some spacing around */
            font-family: 'Arial', sans-serif;
            /* Applies a custom font */
        }

        .product-list-title u {
            text-decoration-color: #26A69A;
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
            /* border: 2px solid #ccc; */
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
            background-color: #26A69A;
            color: #fff;
            border-color: #26A69A;
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

    <style>
        .active-row {
            background-color: #186ab3;
            color: white;
        }

        .order-item-body {
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
    </style>
    @endpush
</x-smart-master>