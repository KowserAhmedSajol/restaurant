<?php

namespace restaurant\restaurant\Controllers\Api;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrder;
use restaurant\restaurant\Models\ResOrderItem;
use restaurant\restaurant\Models\ResProduct;
use restaurant\restaurant\Models\ResTable;
use Illuminate\Support\Facades\DB;
use restaurant\restaurant\Models\ResTax;

class ResOrderApiController extends ResOrderApiBaseController
{
    public function confirmOrder(Request $request)
    {  
        $tokenNo = $this->generateTokenNumber();
        $orderNo = $this->generateOrderNumber($tokenNo);
        $resTable = ResTable::find($request->table_id);
        $res_order = ResOrder::create([
            'uuid' => Str::uuid(),
            'res_table_id' => $resTable->id,
            'res_table_uuid' => $resTable->uuid,
            'res_table_title' => $resTable->name,
            'order_no' => $orderNo,  
            'token_no' => $tokenNo,   
            'order_time' => now()->format('H:i:s'),  
            'order_date' => now()->format('Y-m-d'),  
            'total_qty' => 0, 
            'total_amount' => 0, 
            'status' => 'Ordered',
        ]);
        $totalQty = 0;
        $totalAmount = 0;
        
        foreach ($request->products as $key => $product) {
            $resProduct = ResProduct::find($product['id']);
        
            $qty = $product['quantity'];
            $amount = $resProduct->price * $qty;
        
            $res_order_item = ResOrderItem::create([
                'uuid' => Str::uuid(),
                'res_order_id' => $res_order->id,
                'res_order_uuid' => $res_order->uuid,
                'res_order_title' => $res_order->order_no,
                'res_product_id' => $resProduct->id,
                'res_product_uuid' => $resProduct->uuid,
                'res_product_title' => $resProduct->name,
                'qty' => $qty,
                'rate' => $resProduct->price,
                'amount' => $amount,
            ]);
            $totalQty += $qty;
            $totalAmount += $amount;
        }
        $resTaxes = ResTax::where('status', 1)->get();
        $totalTaxAmount = 0;
        
        foreach ($resTaxes as $tax) {
            $taxAmount = ($tax->percentage / 100) * $totalAmount; 
            $totalTaxAmount += $taxAmount; 
        }
        $totalAmount += $totalTaxAmount;
        $res_order->update([
            'total_qty' => $totalQty,
            'total_amount' => $totalAmount,
        ]);
        $resTable->update([
            'is_occupied' => 1,
        ]);
        

        return response()->json([
            'status' => true,
            'message' => 'Order Created Successfully'
        ], 200);
        
    }
    private function generateTokenNumber()
    {
        $today = now()->format('Y-m-d');
        $maxTokenNo = ResOrder::whereDate('order_date', $today)->max(DB::raw('CAST(token_no AS UNSIGNED)'));
        return $maxTokenNo ? $maxTokenNo + 1 : 1;
    }
    
    
    private function generateOrderNumber($tokenNo)
    {
        $companyPrefix = 'COMP';
        $date = now()->format('Ymd');
        return $companyPrefix . '_' . $date . '_' . $tokenNo;
    }


}