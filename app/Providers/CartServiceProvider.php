<?php namespace App\Providers;

use App\Services\Cart\Cart;

use Illuminate\Support\ServiceProvider;

/**
 * Class AccessServiceProvider
 * @package App\Providers
 */
class cartServiceProvider extends ServiceProvider
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
		$this->registerFacade();
		$this->registerBindings();
	}

	/**
	 * Register the application bindings.
	 *
	 * @return void
	 */
	private function registerCart()
	{
		$this->app->bind('cart', function($app) {
			return new Cart($app);
		});
	}

	/**
	 * Register the vault facade without the user having to add it to the app.php file.
	 *
	 * @return void
	 */
	public function registerFacade() {
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Cart', \App\Services\Cart\Facades\Cart::class);
		});
	}

	/**
	 * Register service provider bindings
	 */
	public function registerBindings() {

		$this->app->bind(
			\App\Repositories\Frontend\Cart\CartContract::class,
			\App\Repositories\Frontend\Cart\EloquentCartRepository::class
		);
	}
}