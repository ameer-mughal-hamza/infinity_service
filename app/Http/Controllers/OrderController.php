<?php

namespace Infinity_Service\Http\Controllers;

use Illuminate\Http\Request;
use Infinity_Service\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order();
        $order->consumer_email = $request->consumer_email;
        $order->consumer_name = $request->name;
        $order->profile_img = $request->profile_img;
        $order->subservice_title = $request->subservice_title;
        $order->subservice_detail = $request->subservice_detail;
        $order->status = 1;
        $order->save();

        return 'success';
    }
}
