<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Payment Receipt</title>
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

    <!-- Payment Copy -->
    <div class="copy-type" style="text-align: center; font-weight: bold; font-size: 18px; margin-bottom: 10px;">
        Payment Receipt
    </div>

    <!-- Header Section -->
    <div class="header" style="text-align: center; margin-bottom: 15px;">
        <h1 style="margin: 0; font-size: 20px;">{{ $data['shop_name'] }}</h1>
        <p style="margin: 2px 0;">{{ $data['address'] }}</p>
        <p style="margin: 2px 0;">{{ $data['phone'] }}</p>
    </div>

    <!-- Token Number -->
    <div class="token-number" style="text-align: center; font-size: 22px; font-weight: bold; margin-bottom: 15px;">
        {{ $data['token_number'] }}
    </div>

    <!-- Order Info -->
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
        <tr>
            <td style="text-align: left;"><strong>Table: {{ $data['table'] }}</strong></td>
            <td style="text-align: right;"><strong>#{{ $data['order_id'] }}</strong></td>
        </tr>
        <tr>
            <td style="text-align: left;">Date: {{ $data['date'] }}</td>
            <td style="text-align: right;">Time: {{ $data['time'] }}</td>
        </tr>
    </table>

    <!-- Separator -->
    <div class="separator" style="border-bottom: 1px dashed #000; margin-bottom: 10px;"></div>

    <!-- Items Table -->
    <table class="table" style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
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

    <!-- Separator -->
    <div class="separator" style="border-bottom: 1px dashed #000; margin-bottom: 10px;"></div>

    <!-- Totals Section -->
    <table class="table totals" style="width: 100%; border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="text-align:right;">Subtotal:</td>
                <td style="text-align:right; width: 20%;">${{ number_format($data['subtotal'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Tax:</td>
                <td style="text-align:right; width: 20%;">${{ number_format($data['tax'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right; font-weight: bold;">Total:</td>
                <td style="text-align:right; width: 20%; font-weight: bold;">${{ number_format($data['total'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Paid:</td>
                <td style="text-align:right; width: 20%;">${{ number_format($data['paid_amount'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Returned:</td>
                <td style="text-align:right; width: 20%;">${{ number_format($data['returned_amount'], 2) }}</td>
            </tr>
            <tr>
                <td style="text-align:right;">Due:</td>
                <td style="text-align:right; width: 20%;">${{ number_format($data['due_amount'], 2) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Separator -->
    <div class="separator" style="border-bottom: 1px dashed #000; margin-bottom: 10px;"></div>

    <!-- Footer Section -->
    <div class="footer" style="text-align: center; font-size: 14px;">
        <p>Thank you for your payment!</p>
        <p style="font-size: 12px;">Visit us again!</p>
    </div>

</body>


</html>
