<?php namespace barisbora\Fanout;

use Illuminate\Support\ServiceProvider;
use barisbora\Fanout\FanoutFactory;

class FanoutServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot ()
    {

        $this->publishes( [
            __DIR__ . '/config/fanout.php' => config_path( 'fanout.php' ),
        ] );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register ()
    {

        $this->app[ 'Fanout' ] = $this->app->share( function ( $app ) {

            $config = config( 'fanout' );

            if ( ! $config ) {
                throw new \RunTimeException( 'Fanout configuration not found. Please run `php artisan vendor:publish`' );
            }

            return new FanoutFactory( $config );

        } );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides ()
    {
        return [ 'Fanout' ];
    }

}
