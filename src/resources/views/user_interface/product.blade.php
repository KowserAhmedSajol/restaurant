<x-smart-master>
    <div class="row">
        <div class="col-md-9">
            {{-- <div class="card card-body text-center">
                <div style="font-size:30px; font-weight:bold;">Tables</div>
            </div> --}}
            <div class="row row-tile no-gutters">
                <div class="col-3">
                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple disabled">
                        <input type="radio" name="options" id="table1" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 1</span>
                    </label>

                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table2" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 2</span>
                    </label>
                </div>

                <div class="col-3">
                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table3" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 3</span>
                    </label>

                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table4" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 4</span>
                    </label>
                </div>

                <div class="col-3">
                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table5" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 5</span>
                    </label>

                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table6" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 6</span>
                    </label>
                </div>

                <div class="col-3">
                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table7" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 7</span>
                    </label>

                    <label class="btn tbl-btn btn-block btn-float m-0 legitRipple">
                        <input type="radio" name="options" id="table8" autocomplete="off">
                        <div class="circle-letter"></div>
                        <span>Table 8</span>
                    </label>
                </div>

                <!-- Repeat for other columns as needed -->
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
                        <!-- Burger Item Header -->
                        <div class="col-md-12">
                            <h5 class="card-title product-list-title" data-category="burger"><b><u>Burger Item</u></b></h5>
                        </div>
                        <!-- Burger Items -->
                        <div class="col-md-3" data-category="burger">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://www.burgerologybd.com/wp-content/uploads/2019/03/Chicken-Burger.jpg" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Chicken Burger</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-category="burger">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://www.thecookingcollective.com.au/wp-content/uploads/2022/04/a-finished-crispy-chicken-burger-on-a-wooden-board-500x375.jpg" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Smoky Chicken Cheese</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-category="burger">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://loveincorporated.blob.core.windows.net/contentimages/main/3d2165d0-7833-4c6a-a62b-3ded52c6da37-smoky-chicken-burgers.jpg" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Chicken Cheese Burger</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-category="burger">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://www.burgerologybd.com/wp-content/uploads/2019/01/IMG_2649-1.jpg" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Smoky BBQ Chicken</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-category="burger">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://www.burgerologybd.com/wp-content/uploads/2019/03/Chicken-Burger.jpg" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Juicy Layer</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-category="burger">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://www.burgerologybd.com/wp-content/uploads/2019/01/IMG_2649-1.jpg" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Beef Burger</b></h5>
                                </div>
                            </div>
                        </div>
                
                        <!-- Meatbox Item Header -->
                        <div class="col-md-12">
                            <h5 class="card-title product-list-title" data-category="meatbox"><b><u>Meatbox Item</u></b></h5>
                        </div>
                        <!-- Meatbox Items -->
                        <div class="col-md-3" data-category="meatbox">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://images.deliveryhero.io/image/fd-bd/Products/2450241.jpg?width=%s" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>BBQ Chicken Meatbox</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-category="meatbox">
                            <div class="card">
                                <img class="card-img-top img-fluid" style="height:180px;" src="https://images.deliveryhero.io/image/fd-bd/Products/7033964.jpg?width=%s" alt="">
                                <div class="card-body">
                                    <h5 class="card-title search-title text-center"><b>Cheesy Box</b></h5>
                                </div>
                            </div>
                        </div> 
                        <!-- Add more categories dynamically -->
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
                <div class="card-body">
                    <div class="order-item" data-product-id="1">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0"><strong style="font-size: 18px">Chicken Cheese Burger</strong></p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn bg-danger btn-icon rounded-round legitRipple delete-item"><i class="icon-trash"></i></button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <p><strong>Price:</strong> <span class="product-price">$230.00</span></p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn bg-warning btn-icon rounded-round legitRipple qty-minus"><i class="icon-minus3"></i></button>
                                <input type="text" class="form-control qty-input" value="2" min="1"
                                    style="width: 50px; margin: 0 10px;">
                                <button type="button" class="btn bg-success btn-icon rounded-round legitRipple qty-plus"><i class="icon-plus3"></i></button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="order-item" data-product-id="1">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0"><strong style="font-size: 18px">Smoky BBQ Beef</strong></p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn bg-danger btn-icon rounded-round legitRipple delete-item"><i class="icon-trash"></i></button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <p><strong>Price:</strong> <span class="product-price">$260.00</span></p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn bg-warning btn-icon rounded-round legitRipple qty-minus"><i class="icon-minus3"></i></button>
                                <input type="text" class="form-control qty-input" value="2" min="1"
                                    style="width: 50px; margin: 0 10px;">
                                <button type="button" class="btn bg-success btn-icon rounded-round legitRipple qty-plus"><i class="icon-plus3"></i></button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="order-item" data-product-id="1">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0"><strong style="font-size: 18px">Smoky Chicken Sandwich</strong></p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn bg-danger btn-icon rounded-round legitRipple delete-item"><i class="icon-trash"></i></button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <p><strong>Price:</strong> <span class="product-price">$210.00</span></p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn bg-warning btn-icon rounded-round legitRipple qty-minus"><i class="icon-minus3"></i></button>
                                <input type="text" class="form-control qty-input" value="2" min="1"
                                    style="width: 50px; margin: 0 10px;">
                                <button type="button" class="btn bg-success btn-icon rounded-round legitRipple qty-plus"><i class="icon-plus3"></i></button>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="total-price">
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <p><strong>Total Price:</strong></p>
                            <span>$130.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





    @push('css')
        {{-- page-specific-css --}}
        <style>

            .product-list-title {
                font-size: 24px; /* Adjusts the font size */
                font-weight: bold; /* Ensures bold text */
                text-decoration: underline; /* Underlines the text */
                color: #333; /* Changes text color, you can adjust */
                text-align: center; /* Centers the text */
                margin: 10px 0; /* Adds some spacing around */
                font-family: 'Arial', sans-serif; /* Applies a custom font */
            }

            .product-list-title u {
                text-decoration-color: #ff5722; /* Custom underline color */
                text-decoration-thickness: 2px; /* Makes the underline thicker */
            }

            .product-list-title {
                transition: color 0.3s ease; /* Adds a smooth transition effect */
            }

            .product-list-title:hover {
                color: #ff5722; /* Changes color on hover */
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
                $('.sidebar-control').click();
                $('#qtyInput').on('keyup', function () {
                    var value = $(this).val().toLowerCase();

                    // Loop through each product card and filter based on the search input
                    $('#product-list .col-md-3').filter(function () {
                        var title = $(this).find('.search-title').text().toLowerCase();
                        $(this).toggle(title.indexOf(value) > -1);
                    });

                    // Loop through each unique category dynamically
                    $('.product-list-title').each(function () {
                        var category = $(this).data('category');
                        
                        // Check if any products of the current category are visible
                        if ($('#product-list .col-md-3[data-category="' + category + '"]:visible').length > 0) {
                            // Show the category header if products are visible
                            $(this).show();
                        } else {
                            // Hide the category header if no products are visible
                            $(this).hide();
                        }
                    });
                });
                $('input[type="radio"]').on('change', function() {
                    $('label.btn').removeClass('active'); // Remove active class from all labels
                    $(this).parent().addClass(
                    'active'); // Add active class to the selected radio's parent label
                });
                $('.btn-float').each(function() {
                    // Get the text from the span
                    var spanText = $(this).find('span').text().trim();

                    // Extract the first letter(s)
                    var firstLetters = spanText.split(' ').map(word => word.charAt(0)).join('');

                    // Set the first letters in the circle letter div
                    $(this).find('.circle-letter').text(firstLetters);
                });
                $('.qty-plus').on('click', function() {
                    var $input = $(this).siblings('.qty-input');
                    var currentVal = parseInt($input.val());
                    if (!isNaN(currentVal)) {
                        $input.val(currentVal + 1);
                    }
                    updateTotalPrice();
                });

                $('.qty-minus').on('click', function() {
                    var $input = $(this).siblings('.qty-input');
                    var currentVal = parseInt($input.val());
                    if (!isNaN(currentVal) && currentVal > 1) {
                        $input.val(currentVal - 1);
                    }
                    updateTotalPrice();
                });

                $('.delete-item').on('click', function() {
                    $(this).closest('.order-item').remove();
                    updateTotalPrice();
                });

                function updateTotalPrice() {
                    var total = 0;
                    $('.order-item').each(function() {
                        var qty = parseInt($(this).find('.qty-input').val());
                        var price = parseFloat($(this).find('.product-price').text().replace('$', ''));
                        total += qty * price;
                    });
                    $('.total-price span').text('$' + total.toFixed(2));
                }
            });
        </script>
    @endpush
</x-smart-master>
