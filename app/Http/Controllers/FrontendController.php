<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Contact;
use Illuminate\Http\Request;

class FrontendController extends Controller {

	public function home() {
		return view( 'frontend.pages.home' );
	}

	public function aboutUs() {
		$about = "Page::where('title', 'about_us')->with('translations')->first()";

		return view( 'frontend.pages.aboutus', compact( 'about' ) );
	}

	public function contactUs() {
		$contact = "Page::where('title', 'contact_us')->with('translations')->first();";

		return view( 'frontend.pages.contactus', compact( 'contact' ) );
	}

	public function postContact( Request $request ) {
		$this->validate( $request, [
			'name'    => 'required|min:3',
			'email'   => 'required|email',
			'content' => 'required|min:10',
		] );

		\DB::transaction( function() use ( $request ) {
			Contact::create( $request->all() );
		} );

		session()->flash( 'message', [
			'success',
			'Thanks for contacting us, we\'ve received your request, be with you soon!',
		] );

		return redirect( '/' );
	}

}
