<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class DashboardController extends Controller {
	public function home() {
		return view( 'dashboard.pages.home' );
	}
}
