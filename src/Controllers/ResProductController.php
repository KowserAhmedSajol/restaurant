<?php

namespace restaurant\restaurant\Controllers;

use restaurant\restaurant\Models\ResTable;
use restaurant\restaurant\Models\ResTax;
use restaurant\restaurant\Models\ResProduct;


class ResProductController extends ResProductBaseController
{

    public function product()
    {
        $resProducts = ResProduct::with('category')->get(); // Assuming 'category' is the relation
        $resTaxes = ResTax::where('status',1)->get();
        $resProducts = $resProducts->groupBy('res_category_title');

        // dd($resProducts);
        $resTables = ResTable::where('status',1)->get();
        return view('restaurant::user_interface.product',compact('resTables','resProducts','resTaxes'));
    }
}
