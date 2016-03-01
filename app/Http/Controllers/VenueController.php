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
		$venues = auth()->user()->venues()->with( 'spaces', 'admins' )->paginate( 8 );

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

		$this->validate( $request, [
			'name'        => 'required|min:3',
			'category_id' => 'required',
		] );

		$venue = new Venue();

		\DB::transaction( function() use ( $request, $venue ) {
			$venue->city      = $request->get( 'city' );
			$venue->latitude  = $request->get( 'latitude' );
			$venue->longitude = $request->get( 'longitude' );
			$venue->address   = $request->get( 'address' );
			$venue->country   = $request->get( 'country' );
			$venue->zip       = $request->get( 'zip' );
			$venue->number    = $request->get( 'number' );
			$venue->email     = $request->get( 'email' );
			$venue->website   = $request->get( 'website' );

			if ( $request->hasFile( 'logo' ) && $request->file( 'logo' )->isValid() ) {
				$venueLogo = $request->file( 'appIcon' );
				$uri       = config( 'services.uploads' )['venues-logos'];
				$path      = public_path() . $uri;
				$this->createFolderIfNotExists( $path );
				$destinationPath = $path;
				$fileName        = "i" . $venue->id . "." . $venueLogo->getClientOriginalExtension();
				$venueLogo->move( $destinationPath, $fileName );
				\Log::debug( sprintf( "New icon image has been uploaded to %s, under the name %s", $destinationPath,
					$fileName ) );
				$venue->logo = $uri . $fileName; // I might not use it, since I can predict what the name is going to be! id.xx
			}

			$venue->save();
		} );

		session()->flash( 'message', [ 'success', 'Successfully Added!' ] );

		return redirect( action( 'VenueController@index' ) );
	}

	protected function createFolderIfNotExists( $path ) {
		$result = true;
		if ( ! file_exists( $path ) ) {
			$result = mkdir( $path, 0755, true );
		}

		return $result;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$venue = Venue::with( 'category', 'spaces.translations' )->where( 'id', $id )->first();

		return view( 'dashboard.venues.show', compact( 'venue' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$venue = Venue::where( 'id', $id )->first();

		return view( 'dashboard.venues.edit', compact( 'venue' ) );
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
		dd($request->all());
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
