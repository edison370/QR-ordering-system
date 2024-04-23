<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display all users.
     */
    public function getAll(Request $request)
    {
        $name = $request->name ? : "";
        //$offer = ($request->offer !== null ? $request->offer : 0) ;

        $users = User::where('name', 'LIKE', "%".$name."%")->paginate(2);

        //remove page request
        $requestUrl = str_replace('&page='.$request->page,'',$_SERVER["REQUEST_URI"]);

        return view('report.UserListResult', [
            'users' => $users, 'requestUrl' =>$requestUrl
        ])->render();
    }

    public function updateUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:30',
        ]);


        return redirect('/userList')->with('success', 'Successfully updated!');   ;
    }

    public function getUser($id, Request $request)
    {
        $user = User::findOrFail($id);
        return view('modals.editUserModal', ['user' => $user]);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
