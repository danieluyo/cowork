<?php

namespace App\Http\Controllers\Space;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Space;
use App\Models\Tag;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces = Space::with('translations', 'venue', 'category', 'bookings', 'media', 'tags')->paginate(8);

        return view('dashboard.spaces.index', compact('spaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('translations')->get();
        $amenities  = Tag::with('translations')->get();

        return view('dashboard.spaces.create', compact('categories', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user_id = auth()->user()->id;
        dd($request->all());
        $space                       = new Space();
        $space->category_id          = $request->get('category_id');
        $space->country_id           = $request->get('country_id');
        $space->region_id            = $request->get('region_id');
        $space->city_id              = $request->get('city_id');
        $space->type                 = $request->get('type');
        $space->tags                 = $request->get('tags');
        $space->hourly_price         = $request->get('hourly_price');
        $space->daily_price          = $request->get('daily_price');
        $space->monthly_price        = $request->get('monthly_price');
        $space->max_number_of_people = $request->get('max_number_of_people');
        $space->area                 = $request->get('area');
        $space->address              = $request->get('address');
        $space->zip                  = $request->get('zip');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $space = Space::where('id', $id);

        return view('dashboard.spaces.edit', compact('space'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
