<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
	 *
	 * @return void
	 */
	public function boot( GateContract $gate ) {
		$this->registerPolicies( $gate );

		$gate->define( 'user-himself', function( $user ) {
			return auth()->user()->id == $user->id;
		} );

		$gate->define( 'active-user', function() {
			return auth()->user()->status == User::STATUS_ACTIVE;
		} );

		$gate->define( 'admin', function() {
			return auth()->user()->role == User::ROLE_ADMIN;
		} );

		$gate->define( 'super', function() {
			return auth()->user()->role == User::ROLE_SUPER;
		} );
	}
}
