<?php


namespace App\Domain\Services\Factory;


use App\Domain\Services\Interfaces\IHotelInterface;
use App\Domain\Traits\filterData;

class Price implements  IHotelInterface
{
    use filterData ;
    public function getFilteredHotels($data){
        return  $this->getJsonDataByRange($data['response'] , 'price', $data['data']['filter_value']['min'], $data['data']['filter_value']['max']);

    }
}
