<?php


namespace App\Domain\Services\Factory;



class FilterGateWayFactory
{
    protected $gateway;

    public function __construct( $gateway)
    {
        $this->gateway = __NAMESPACE__ .'\\'.(ucwords($gateway));
        $this->gateway=new $this->gateway;
    }


    public function __call($method, $arguments)
    {
        return $this->gateway->{$method}(...$arguments);
    }

}

