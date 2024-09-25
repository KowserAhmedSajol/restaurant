<?php

namespace restaurant\restaurant\Controllers\Api;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrderItem;
use restaurant\restaurant\Models\ResTax;

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
}