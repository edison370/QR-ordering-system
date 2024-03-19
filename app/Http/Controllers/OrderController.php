<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

class OrderController extends Controller
{
    public function getClientOrder(Request $request){
        $orders = Order::where("status","!=","Paid")->with('order_details.item')->get();

        return view('modules.client.orderPage', ['orders' => $orders])->render(); 
    }

    public function getAll(Request $request)
    {
        $name = $request->name ? : "";
        //$offer = ($request->offer !== null ? $request->offer : 0) ;

        $users = Item::where('name', 'LIKE', "%".$name."%")->paginate(1);

        //remove page request
        $requestUrl = str_replace('&page='.$request->page,'',$_SERVER["REQUEST_URI"]);

        return view('report.UserReportResult', [
            'users' => $users, 'requestUrl' =>$requestUrl
        ])->render();
    }

    public function editOrder(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:30',
        ]);


        return redirect('/userReport')->with('success', 'Successfully updated!');   ;
    }

    public function getOrder($id, Request $request)
    {
        $user = Item::findOrFail($id);
        return view('report.editUserModal', ['user' => $user]);
    }

}
