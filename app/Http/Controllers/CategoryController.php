<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categories = Category::with( 'translations' )->paginate( 10 );

		if ( $categories->count() > 0 ) {
			return view( 'dashboard.categories.index', compact( 'categories' ) );
		}

		return redirect( route( 'dashboard.categories.create' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::with( 'translations' )->get();

		if ( $categories->count() == 0 ) {
			session()->flash( 'message', [ 'warning', 'There is no categories to be listed! create new please' ] );
		}

		return view( 'dashboard.categories.create', compact( 'categories' ) );
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
			'title'       => 'required|min:3',
			'description' => 'min:3',
		] );
		\DB::transaction( function() use ( $request ) {
			return Category::create( $request->all() );
		} );

		// Todo: find out why this flash message is being flushed!!
		session()->flash( 'message', [ 'success', 'Your new category created successfully!' ] );
//		$categories = Category::with( 'translations' )->paginate( 10 );

//		return view( 'dashboard.categories.index', compact( 'categories' ) );
//		return redirect( route( 'dashboard.categories.index' ) );
		return redirect( 'dashboard/categories/' );
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
		$category = Category::where( 'id', $id )->with( 'translations' )->first();

		$categories = Category::with( 'translations' )->get();

		return view( 'dashboard.categories.edit', compact( 'category', 'categories' ) );
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

		$this->validate( $request, [
			'title'       => 'required|min:3',
			'description' => 'min:3',
		] );
		$category  = Category::find( $id );
		$old_title = $category->title;
		if ( $category ) {
			\DB::transaction( function() use ( $request, $category ) {
				$category->translate()->title       = $request->get( 'title' );
				$category->translate()->description = $request->get( 'description' );
				$category->parent_id                = $request->get( 'parent_id' );

				return $category->save();
			} );
		}

		session()->flash( 'message', [
			'success',
			"Your category has been updated from <strong><i>"
			. $old_title
			. "</i></strong> to <strong><i>"
			. $category->title
			. "</i></strong>, successfully!",
		] );
		$categories = Category::with( 'translations' )->paginate( 10 );

		return view( 'dashboard.categories.index', compact( 'categories' ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		$result = Category::where( 'id', $id )->delete();

		if ( $result == 1 ) {
			session()->flash( 'message', [ 'warning', " Record Deleted!" ] );
		} else {
			session()->flash( 'message', [ 'danger', "It has been deleted already!" ] );
		}

		return redirect( route( 'dashboard.categories.index' ) );
	}
}