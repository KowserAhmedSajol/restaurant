<x-smart-master>

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
                            <tr style="cursor:pointer;" class="order-row" data-id="{{ $order->id }}">
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
                <div class="card-body order-item-body" style="min-height:700px;">
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
                                <!-- Dynamic content will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center mb-2"
                    style="width: 98%; margin: auto; display: flex; justify-content: space-between;">
                    <button type="button" class="btn btn-info legitRipple" id="updateOrder" style="flex: 1; margin-right: 5px;">
                        <i class="icon-pen-plus mr-2"></i> Update Order
                    </button>
                    <button type="button" class="btn btn-success legitRipple" id="orderPayment" style="flex: 1; margin-left: 5px;">
                        <i class="icon-credit-card2 mr-2"></i> Proceed To Payment
                    </button>
                </div>
            </div>

        </div>
    </div>






    @push('js')
    {{-- page-specific-js --}}
    {{-- <script src="{{asset('vendor/theme/global_assets/js/demo_pages/datatables_basic.js')}}"></script> --}}
    <script>
    let globalResTaxes; 

    $(document).ready(function() {
        $('#updateOrder').on('click', updateOrder);
        $('#orderPayment').on('click', orderPayment);
        
        $('.sidebar-control').click();
        
        
        $('.order-row').on('click', function() {
            $('.order-row').removeClass('active-row');
            $(this).addClass('active-row');
            let orderId = $(this).data('id');
            loadOrderItem(orderId);
        });
        
        
        $(document).on('click', '.add-row-button', function() {
            addNewRow();
        });
        
        
        $(document).on('click', '.remove-row-button', function() {
            $(this).closest('tr').remove(); 
            updateTotals(globalResTaxes); 
        });
    });

    function orderPayment() {
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
            },
            success: function(response) {
                let orderRow = $(`#orderTbody .order-row[data-id='${response.orderId}']`);
            
                // Update total quantity and total amount in the corresponding row
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

            },
            error: function(error) {
                console.error("Error in submitting order:", error);
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
                            <select class="form-control" name="">
                                <option value="Cash">Cash</option>
                                <option value="Bkash">Bkash</option>
                            </select>
                            </td>
                            <td colspan="2">
                                <input type="text" class="form-control receivedAmount" value="" min="1" style="text-align: right;">
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
                    let receivedAmount = parseFloat($(this).val()) || 0; // Get the received amount, default to 0 if empty
                    let totalAmount = parseFloat($('.total-amount-row td:last').text().replace('$', '')); // Get the total amount

                    // Calculate return amount
                    let returnAmount = receivedAmount - totalAmount;

                    // Update the return amount display
                    $('.returnAmount').text(`$ ${returnAmount.toFixed(2)}`);
                });

            },
            error: function(error) {
                console.error("Error in submitting order:", error);
            }
        });
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