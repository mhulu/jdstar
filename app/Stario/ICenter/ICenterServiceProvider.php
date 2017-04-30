<?php
namespace Star\ICenter;

use Illuminate\Support\ServiceProvider;

class ICenterServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		// Publish the migration
		$timestamp = '1949_07_15_100000';
		$this->publishes([
			__DIR__ . '/resources/migrations/create_icenter_tables.php.stub' => $this->app->databasePath() . '/migrations/' . $timestamp . '_create_icenter_tables.php',
		], 'migrations');

		$this->loadRoutesFrom(__DIR__ . '/routes.php');
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'icenter');
	}
}
