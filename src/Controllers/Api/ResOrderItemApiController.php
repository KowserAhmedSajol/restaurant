<?php

namespace restaurant\restaurant\Controllers\Api;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrderItem;
use restaurant\restaurant\Models\ResOrder;
use restaurant\restaurant\Models\ResTax;
use restaurant\restaurant\Models\ResProduct;

class ResOrderItemApiController extends ResOrderItemApiBaseController
{
    public function loadOrderItem(Request $request)
    {
        // dd($request->orderId);
        $orderItems = ResOrderItem::where('res_order_id',$request->orderId)->get();
        $resTaxes = ResTax::where('status',1)->get();
        return response()->json([
            'status' => true,
            'data' => $orderItems,
            'resTaxes' => $resTaxes
        ], 200);
    }



    public function updateOrderItem(Request $request)
    {

        $resOrder = ResOrder::find($request->orderId);
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
    
        return response()->json([
            'success' => true, 
            'message' => 'Order items updated successfully',
            'orderId' => $resOrder->id,
            'total_qty' => $resOrder->total_qty,
            'total_amount' => $resOrder->total_amount,
        ]);
    }
}