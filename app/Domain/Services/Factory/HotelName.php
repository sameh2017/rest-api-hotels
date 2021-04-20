<?php


namespace App\Domain\Services\Factory;
use App\Domain\Traits\filterData;
use  App\Domain\Services\Interfaces\IHotelInterface;

class HotelName implements  IHotelInterface
{
use filterData ;

    public function getFilteredHotels($data){
        return  $this->getJsonDataByFilterType($data['response'] , 'name', $data['data']['filter_value']);

    }
}
