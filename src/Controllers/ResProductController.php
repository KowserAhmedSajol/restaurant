<?php

namespace restaurant\restaurant\Controllers;


class ResProductController extends ResProductBaseController
{

    public function product()
    {
        return view('restaurant::user_interface.product');
    }
}
