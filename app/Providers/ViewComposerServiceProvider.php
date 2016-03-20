<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Space;
use App\Models\Tag;
use App\Models\Venue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->user();
        $this->leftMenuCounts();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function user() {
        view()->composer( '*', function( $view ) {
            $view->with( 'user', auth()->user() );
        } );
    }

    private function leftMenuCounts() {
	    view()->composer( 'dashboard._partials.left.menu_bar', function( $view ) {
		    $view->with( 'usersCount', User::count() );
		    $view->with( 'categoriesCount', Category::count() );
		    $view->with( 'venuesCount', Venue::count() );
		    $view->with( 'spacesCount', Space::count() );
		    $view->with( 'amenitiesCount', Tag::where( 'type', 'amenity' )->count() );
	    } );
    }
}
