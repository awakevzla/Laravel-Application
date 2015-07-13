<?php namespace App\Ip2Country;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class Ip2CountryServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		AliasLoader::getInstance()->alias('Ip2Country', 'App\Ip2Country\Ip2Country');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
