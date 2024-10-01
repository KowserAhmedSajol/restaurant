<?php

namespace restaurant\restaurant\Controllers;


use App\Http\Controllers\Controller;
use Mpdf\Mpdf;
use restaurant\restaurant\Models\ResOrder;
use restaurant\restaurant\Models\ResOrderItem;
use restaurant\restaurant\Models\ResTax;
use restaurant\restaurant\Models\ResBilling;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function generateThermalReceipt($id)
    {
            // Retrieve the order by ID
        $resOrder = ResOrder::find($id);

        // Prepare data for receipt using attributes from the resOrder
        $data = [
            'shop_name' => 'Sentinel Technologies Ltd', // Replace with actual shop name
            'address' => 'Khan Tower, Holding No : 14 & 16 , Sonargoan Janapath Road , Sector-11 , Uttara Dhaka-1230, Bangladesh', // Replace with actual address
            'phone' => '+ 880 1716 220 220, + 880 1902 885 320', // Replace with actual phone number
            'order_id' => $resOrder->order_no, // Use the order_no from the order
            'table' => $resOrder->res_table_title,
            'date' => Carbon::parse($resOrder->order_date)->format('F j, Y'), // Human-readable date
            'time' => Carbon::parse($resOrder->order_time)->format('g:i A'), // Human-readable time
            'token_number' => $resOrder->token_no, // Token number from the order
            'items' => [], // Initialize items array
            'subtotal' => $resOrder->total_amount, // This will be updated after tax
            'tax' => 0, // Initialize tax
            'total' => 0, // Initialize total, will be updated later
        ];

        // Fetch the order items and calculate subtotal
        $orderItems = ResOrderItem::where('res_order_id', $resOrder->id)->get();
        $subtotal = 0;
        
        foreach ($orderItems as $item) {
            $itemTotal = $item->rate * $item->qty;
            $data['items'][] = [
                'name' => $item->res_product_title,
                'qty' => $item->qty,
                'price' => $item->rate,
            ];
            $subtotal += $itemTotal;
        }

        // Calculate tax based on active taxes
        $resTaxes = ResTax::where('status', 1)->get();
        $totalTaxAmount = 0;

        foreach ($resTaxes as $tax) {
            $taxAmount = ($tax->percentage / 100) * $subtotal; 
            $totalTaxAmount += $taxAmount;
        }

        // Update subtotal, tax, and total amounts in the $data array
        $totalAmount = $subtotal + $totalTaxAmount;
        $data['subtotal'] = $subtotal;
        $data['tax'] = $totalTaxAmount;
        $data['total'] = $totalAmount;
        
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => [80, 180], // Width: 80mm, Height: 297mm
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'shrink_tables_to_fit' => true,
        ]);
    
        $html = view('restaurant::pdf.thermal_receipt', compact('data'))->render();
        $mpdf->WriteHTML($html);
        
        return $mpdf->Output('receipt_' . $resOrder->order_no . '.pdf', 'I'); // Directly output the PDF in the browser
    }


    public function generatePaymentBill($id)
    {
        // Retrieve the order by ID
        $resOrder = ResOrder::find($id);
    
        // Retrieve the billing info for the order
        $resBilling = ResBilling::where('res_order_id', $id)->first();
    
        // If no billing information is found, you may want to handle it accordingly
        if (!$resBilling) {
            abort(404, 'Billing information not found.');
        }
    
        // Prepare data for receipt using attributes from the resOrder and resBilling
        $data = [
            'shop_name' => 'Sentinel Technologies Ltd', // Replace with actual shop name
            'address' => 'Khan Tower, Holding No : 14 & 16 , Sonargoan Janapath Road , Sector-11 , Uttara Dhaka-1230, Bangladesh', // Replace with actual address
            'phone' => '+ 880 1716 220 220, + 880 1902 885 320', // Replace with actual phone number
            'order_id' => $resOrder->order_no, // Use the order_no from the order
            'table' => $resOrder->res_table_title,
            'date' => Carbon::parse($resOrder->order_date)->format('F j, Y'), // Human-readable date
            'time' => Carbon::parse($resOrder->order_time)->format('g:i A'), // Human-readable time
            'token_number' => $resOrder->token_no, // Token number from the order
            'items' => [], // Initialize items array
            'subtotal' => $resOrder->total_amount, // This will be updated after tax
            'tax' => 0, // Initialize tax
            'total' => 0, // Initialize total, will be updated later
            'payment_method' => $resBilling->payment_type, // Assuming payment method is stored in resBilling
            'paid_amount' => $resBilling->received_amount, // Get paid amount from resBilling
            'returned_amount' => $resBilling->returned_amount, // Get paid amount from resBilling
            'due_amount' => max($resOrder->total_amount - $resBilling->received_amount, 0), // Calculate due amount
        ];
    
        // Fetch the order items and calculate subtotal
        $orderItems = ResOrderItem::where('res_order_id', $resOrder->id)->get();
        $subtotal = 0;
    
        foreach ($orderItems as $item) {
            $itemTotal = $item->rate * $item->qty;
            $data['items'][] = [
                'name' => $item->res_product_title,
                'qty' => $item->qty,
                'price' => $item->rate,
            ];
            $subtotal += $itemTotal;
        }
    
        // Calculate tax based on active taxes
        $resTaxes = ResTax::where('status', 1)->get();
        $totalTaxAmount = 0;
    
        foreach ($resTaxes as $tax) {
            $taxAmount = ($tax->percentage / 100) * $subtotal;
            $totalTaxAmount += $taxAmount;
        }
    
        // Update subtotal, tax, and total amounts in the $data array
        $totalAmount = $subtotal + $totalTaxAmount;
        $data['subtotal'] = $subtotal;
        $data['tax'] = $totalTaxAmount;
        $data['total'] = $totalAmount;
    
        // Initialize MPDF
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => [80, 180], // Width: 80mm, Height: 297mm
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'shrink_tables_to_fit' => true,
        ]);
    
        // Render the HTML view for payment receipt
        $html = view('restaurant::pdf.payment_receipt', compact('data'))->render();
        $mpdf->WriteHTML($html);
    
        // Output the PDF in the browser
        return $mpdf->Output('payment_receipt_' . $resOrder->order_no . '.pdf', 'I');
    }
    
    
}