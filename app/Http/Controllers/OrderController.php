<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Table;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function getClientOrder(Request $request)
    {

        $tableID = Table::where("description", $request->session()->get('table'))->first()->id ?? "";

        $orders = Order::where("status", "!=", "Paid")->where("tableID", $tableID)->with('order_details.order')->get();

        return view('modules.client.orderPage', ['orders' => $orders])->render();
    }

    public function getAll(Request $request)
    {
        $name = $request->name ?: "";
        //$offer = ($request->offer !== null ? $request->offer : 0) ;

        $orders = Order::paginate(10);

        //remove page request
        $requestUrl = str_replace('&page=' . $request->page, '', $_SERVER["REQUEST_URI"]);

        return view('report.orderListResult', [
            'orders' => $orders, 'requestUrl' => $requestUrl
        ])->render();
    }

    public function updateOrder(Request $request)
    {
        $validated = $request->validate([]);

        return redirect('/orderList')->with('success', 'Successfully updated!');;
    }

    public function createorder(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',

        ]);

        return redirect('/orderList')->with('success', 'Successfully added!');
    }

    public function getOrder($id, Request $request)
    {
        $order = order::findOrFail($id);
        return view('modals.editOrderModal', ['order' => $order]);
    }

    public function placeOrder(Request $request)
    {
        $total = 0;
        $itemData = unserialize($request->cookie('item_data'));

        if (!$itemData) {
            redirect('/')->with('fail', 'Error');
        }

        if(!$request->session()->has('table')){
            redirect('/')->with('fail', 'Error');
        }

        $tableName = $request->session()->get('table');
        $tableData = Table::where("description", $tableName)->first();

        //create order
        $order = new Order;
        $order->tableID = $tableData->id;
        $order->status = "Pending to accept";
        $order->save();

        //create order details
        foreach ($itemData as $item) {
            $temp = Item::find($item["id"])->getRawOriginal();
            $temp["subTotal"] = $item["quantity"] * floatval($temp["price"]);

            $total += $temp["subTotal"];

            $orderDetail = new Order_detail;
            $orderDetail->orderID = $order->id;
            $orderDetail->itemID = $item["id"];
            $orderDetail->quantity = $item["quantity"];
            $orderDetail->comment = $item["remark"];
            $orderDetail->amount = $temp["subTotal"];
            $orderDetail->save();
        }

        //save total amount
        $order->amount = $total;
        $order->save();

        //clear shopping cart cookie
        $cookie = Cookie::forget('item_data');

        return redirect('/')->with('success', 'Successfully placed order!')->cookie($cookie);
    }
}
