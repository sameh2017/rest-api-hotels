<?php


namespace App\Domain\Services\Factory;


use App\Domain\Services\Interfaces\IHotelInterface;
use App\Domain\Traits\filterData;

class Destination implements  IHotelInterface
{
    use filterData ;

    public function getFilteredHotels($data){
        return  $this->getJsonDataByFilterType($data['response'] , 'city', $data['data']['filter_value']);

    }
}
