<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class OrderController extends Controller
{
    public function getClientOrder(Request $request){
        $orders = Order::where("status","!=","Finished")->with('order_details.item')->get();

        return view('modules.client.orderPage', ['orders' => $orders])->render(); 
    }
}
