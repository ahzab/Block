<?php namespace Lavalite\Block;

use Illuminate\Support\ServiceProvider;

class BlockServiceProvider extends ServiceProvider {

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
		$this->package('lavalite/block');
        include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('block', function ($app) {
        	return $this->app->make('Lavalite\Block\Block');
   		});

	    $this->app->bind(
	        'Lavalite\\Block\\Interfaces\\BlockInterface',
	        'Lavalite\\Block\\Repositories\\Eloquent\\BlockRepository'
	    );
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
