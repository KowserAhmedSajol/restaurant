<?php

namespace restaurant\restaurant\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrderItem;
use restaurant\restaurant\Models\ResOrder;
use restaurant\restaurant\Models\ResTax;
use restaurant\restaurant\Models\ResProduct;
use restaurant\restaurant\Models\ResBilling;
use restaurant\restaurant\Models\ResTable;

class ResBillingApiController extends ResBillingApiBaseController
{
    public function orderPayment(Request $request)
    {
        // dd($request->paymentData['paymentMethod']);
        $resOrder = ResOrder::find($request->orderId);
        if (!$resOrder) {
            return response()->json([
                'error' => true,
                'message' => 'Order not found.'
            ], 404);
        }
        if ($resOrder->status == 'Paid') {
            return response()->json([
                'error' => true,
                'message' => 'This order has already been paid.'
            ], 400); // 400 Bad Request
        }

        foreach ($request->orderItems as $key => $order_item) {
            if ($order_item['id'] == '0') {
                $resProduct = ResProduct::find($order_item['productId']);
                $qty = $order_item['quantity'];
                $amount = $resProduct->price * $qty;
                ResOrderItem::create([
                    'uuid' => Str::uuid(),
                    'res_order_id' => $resOrder->id,
                    'res_order_uuid' => $resOrder->uuid,
                    'res_order_title' => $resOrder->order_no,
                    'res_product_id' => $resProduct->id,
                    'res_product_uuid' => $resProduct->uuid,
                    'res_product_title' => $resProduct->name,
                    'qty' => $qty,
                    'rate' => $resProduct->price,
                    'amount' => $amount,
                ]);
            } else {
                $resOrderItem = ResOrderItem::where('id', $order_item['id'])
                                            ->where('res_order_id', $request->orderId)
                                            ->first();                         
                if ($resOrderItem) {
                    $resOrderItem->update([
                        'qty' => $order_item['quantity'],
                        'amount' => $order_item['amount'],
                    ]);
                }
            }
        }

        $orderItemIds = array_column($request->orderItems, 'id'); 
        $resOrderItemsSum = ResOrderItem::where('res_order_id', $request->orderId)
            ->selectRaw('SUM(qty) as total_qty, SUM(amount) as total_amount')
            ->first();
        $resTaxes = ResTax::where('status', 1)->get();
        $totalTaxAmount = 0;
        foreach ($resTaxes as $tax) {
            $taxAmount = ($tax->percentage / 100) * $resOrderItemsSum->total_amount; 
            $totalTaxAmount += $taxAmount;
        }
        $resOrderItemsSum->total_amount += $totalTaxAmount;
        if ($resOrderItemsSum) {
            $totalQty = $resOrderItemsSum->total_qty;
            $totalAmount = $resOrderItemsSum->total_amount;
        }

        $resOrder->update([
            'total_qty' => $totalQty,
            'total_amount' => $totalAmount,
        ]);

        ResBilling::create([
            'uuid' => Str::uuid(),
            'res_order_id' => $resOrder->id,
            'res_order_uuid' => $resOrder->uuid,
            'res_order_title' => $resOrder->order_no,
            'res_table_id' => $resOrder->res_table_id,
            'res_table_uuid' => $resOrder->res_table_uuid,
            'res_table_title' => $resOrder->res_table_title,
            'status' => 'Paid',
            'date' => now()->format('Y-m-d'),
            'time' => now()->format('H:i:s'),
            'payment_type' => $request->paymentData['paymentMethod'],
            'phone_number' => $request->paymentData['phoneNumber'],
            'transaction_id' => $request->paymentData['transactionId'],
            'total_amount' => $totalAmount,
            'received_amount' => $request->paymentData['receivedAmount'],
            'returned_amount' => $request->paymentData['returnAmount'],
        ]);

        $resOrder->update([
            'status' => "Paid",
        ]);

        $resTable = ResTable::find($resOrder->res_table_id);
        $resTable->update([
            'is_occupied' => 0,
        ]);
        return response()->json([
            'success' => true, 
            'message' => 'Order items updated successfully',
            'orderId' => $resOrder->id,
            'total_qty' => $resOrder->total_qty,
            'total_amount' => $resOrder->total_amount,
            'status' => $resOrder->status,
        ]);
    }


    public function getTotalPaidBills()
    {
        $totalPaidBills = ResBilling::where('status','Paid')->whereDate('created_at', now()->toDateString())->count();

        return response()->json([
            'totalPaidBills' => $totalPaidBills
        ]);
    }


    public function getTotalUnpaidBills()
    {
        $totalUnpaidBills = ResOrder::where('status','Ordered')->whereDate('created_at', now()->toDateString())->count();

        return response()->json([
            'totalUnpaidBills' => $totalUnpaidBills
        ]);
    }


    public function getTotalBills()
    {
        $totalBillsToday = ResOrder::whereDate('created_at', now()->toDateString())->count();

        return response()->json([
            'totalBills' => $totalBillsToday
        ]);
    }

    public function getTotalAmountSold()
    {
        $totalAmountSold = ResBilling::where('status', 'Paid')
        ->whereDate('created_at', now()->toDateString())
        ->sum('total_amount');

        return response()->json([
            'totalAmountSold' => $totalAmountSold
        ]);
    }
}