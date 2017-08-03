<?php namespace App\Providers;


use Illuminate\Support\ServiceProvider;

/**
 * Class AccessServiceProvider
 * @package App\Providers
 */
class OrderServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;



	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerCart();
		$this->registerBindings();
	}

	/**
	 * Register the application bindings.
	 *
	 * @return void
	 */
	private function registerCart()
	{
		$this->app->bind('order', function($app) {
			return new Order($app);
		});
	}

	/**
	 * Register service provider bindings
	 */
	public function registerBindings() {

		$this->app->bind(
			\App\Repositories\Frontend\Order\EloquentOrderRepository::class
		);
	}
}