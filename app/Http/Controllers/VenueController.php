<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$venues = auth()->user()->venues()->with( 'spaces', 'admins', 'media')->paginate( 8 );
//		$venues = Venue::with( 'spaces', 'admins', 'logo' )->paginate( 8 );

		return view( 'dashboard.venues.index', compact( 'venues' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::with( 'translations' )->get();
		$amenities  = Tag::with( 'translations' )->get();

		return view( 'dashboard.venues.create', compact( 'categories', 'amenities' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
