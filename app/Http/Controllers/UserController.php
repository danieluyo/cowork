<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index()
	{
        $users = User::with('spaces','bookings','labs','following')->paginate('10');
        return view('dashboard.users.index',compact('users'));
	}
}
