<?php
namespace App\Domain\AppServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\Interfaces\IHotelInterface;
use App\Domain\Services\Factory\HotelName;
use App\Domain\Services\Factory\Price;
use App\Domain\Services\Factory\Destination;

/**
 * Custom Service Provider To Register Our Structure
 *
 * @return void
 */
class InjectorServiceProviders extends ServiceProvider{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       parent::register();

       $this->app->singleton(IHotelInterface::class ,HotelName::class );
       $this->app->singleton(IHotelInterface::class ,Price::class );
       $this->app->singleton(IHotelInterface::class ,Destination::class );
    }
}
