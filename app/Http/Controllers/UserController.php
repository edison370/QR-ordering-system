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
    public function getAll(Request $request): View
    {
        return view('page.report', [
            'users' => User::paginate(1),
        ]);
    }
}
