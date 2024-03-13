<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display all users.
     */
    public function getAll(Request $request)
    {
        $name = $request->name ? : "";
        //$offer = ($request->offer !== null ? $request->offer : 0) ;

        $users = User::where('name', 'LIKE', "%".$name."%")->paginate(1);

        //remove page request
        $requestUrl = str_replace('&page='.$request->page,'',$_SERVER["REQUEST_URI"]);

        return view('report.UserReportResult', [
            'users' => $users, 'requestUrl' =>$requestUrl
        ])->render();
    }
}
