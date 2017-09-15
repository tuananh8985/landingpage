<?php namespace Ecnet\Shop;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider {

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
		$this->package('ecnet/shop');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		include __DIR__.'/routes.php';
		require(__DIR__.'/../../Acme/helpers.php');

		\App::error(function (\Laracasts\Validation\FormValidationException $exception, $code) {
			return \Redirect::back()->withInput()->withErrors($exception->getErrors());
		});
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
