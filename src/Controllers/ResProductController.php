<?php

namespace restaurant\restaurant\Controllers;

use restaurant\restaurant\Models\ResTable;
use restaurant\restaurant\Models\ResTax;
use restaurant\restaurant\Models\ResProduct;
use restaurant\restaurant\Models\ResOrder;
use Carbon\Carbon;

class ResProductController extends ResProductBaseController
{

    public function product()
    {
        $resProducts = ResProduct::with('category')->get(); // Assuming 'category' is the relation
        $resTaxes = ResTax::where('status',1)->get();
        $products = $resProducts->groupBy('res_category_title');

        // dd($resProducts);
        $resTables = ResTable::where('status',1)->get();
        $resOrders = ResOrder::where('created_at', '>=', Carbon::now()->subDays(1))
        ->orderBy('id', 'desc')
        ->get();
        $resProducts = ResProduct::with('category')->get();
        return view('restaurant::user_interface.product',compact('resTables','resTaxes','resOrders','resProducts','products'));
    }

    public function productOrderList()
    {
        $resOrders = ResOrder::where('created_at', '>=', Carbon::now()->subDays(1))
        ->orderBy('id', 'desc')
        ->get();
        $resProducts = ResProduct::with('category')->get();
        return view('restaurant::user_interface.product-order-list', compact('resOrders','resProducts'));
    }
}
