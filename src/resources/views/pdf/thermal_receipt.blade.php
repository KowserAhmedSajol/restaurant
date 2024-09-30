<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thermal Receipt for Customer and Kitchen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }
        .header, .footer {
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 14px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 2px 0;
        }
        .totals {
            font-weight: bold;
        }
        .separator {
            border-bottom: 1px solid black;
            margin: 10px 0;
        }
        .token-number {
            margin: 10px auto;            /* Center the element horizontally */
            width: 60px;                  /* Increased width for better fit */
            height: 60px;                 /* Increased height for better fit */
            border: 2px solid black;      /* Border around the circle */
            border-radius: 50%;           /* Make it a circle */
            text-align: center;           /* Center the text horizontally */
            line-height: 60px;            /* Center the text vertically by matching the height */
            font-weight: bold;            /* Bold text */
            font-size: 26px;              /* Keep the font size at 26px */
            overflow: hidden;             /* Ensure no overflow of text */
        }

        .copy-type {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            margin-top: 10px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    <!-- Customer Copy -->
    <div class="copy-type">
        Customer Copy
    </div>

    <div class="header">
        <h1>{{ $data['shop_name'] }}</h1>
        <p>{{ $data['address'] }}</p>
        <p>{{ $data['phone'] }}</p>
    </div>

    {{-- <div class="separator"></div> --}}

    <!-- Token Number -->
    <div class="token-number">
        {{ $data['token_number'] }}
    </div>

    {{-- <div class="separator"></div> --}}

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td colspan="2" style="text-align: left;"><strong><h1>Table:  &nbsp;&nbsp;  {{ $data['table'] }}</h1></strong></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><strong>#{{ $data['order_id'] }}</strong></td>
        </tr>
        <tr>
            <td style="text-align: left;">Date: {{ $data['date'] }}</td>
            <td style="text-align: right;">Time: {{ $data['time'] }}</td>
        </tr>
    </table>
    
    

    <div class="separator"></div>

    <table class="table">
        <thead>
            <tr>
                <th style="text-align:left;">Item</th>
                <th style="text-align:right;">Qty</th>
                <th style="text-align:right;">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['items'] as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td style="text-align:right;">X {{ $item['qty'] }}</td>
                <td style="text-align:right;">${{ number_format($item['price'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="separator"></div>

    <table class="table totals">
        <tbody>
            <tr>
                <td style="text-align:right;">Subtotal:</td>
                <td style="text-align:right; width:20%;">${{ number_format($data['subtotal'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Tax:</td>
                <td style="text-align:right; width:20%;">${{ number_format($data['tax'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Total:</td>
                <td style="text-align:right; width:20%;">${{ number_format($data['total'], 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="separator"></div>

    <div class="footer">
        <p>Thank you for your purchase!</p>
    </div>

    <div class="page-break"></div>

    <!-- Kitchen Copy -->
    <div class="copy-type">
        Kitchen Copy
    </div>

    <div class="header">
        <h1>{{ $data['shop_name'] }}</h1>
        <p>{{ $data['address'] }}</p>
        <p>{{ $data['phone'] }}</p>
    </div>


    <!-- Token Number -->
    <div class="token-number">
        {{ $data['token_number'] }}
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td colspan="2" style="text-align: left;"><strong><h1>Table:  &nbsp;&nbsp;    {{ $data['table'] }}</h1></strong></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><strong>#{{ $data['order_id'] }}</strong></td>
        </tr>
        <tr>
            <td style="text-align: left;">Date: {{ $data['date'] }}</td>
            <td style="text-align: right;">Time: {{ $data['time'] }}</td>
        </tr>
    </table>
    
    

    <div class="separator"></div>

    <table class="table">
        <thead>
            <tr>
                <th style="text-align:left;">Item</th>
                <th style="text-align:right;">Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['items'] as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td style="text-align:right;">X {{ $item['qty'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="separator"></div>

    <div class="footer">
        <p>Prepare Order As Soon As Possible!</p>
    </div>

</body>
</html>
