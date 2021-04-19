<?php


namespace App\Domain\Services\Factory;
use  App\Domain\Services\Classes\Currency;
use  App\Domain\Services\Classes\Range;
use  App\Domain\Services\Classes\Status;

class FilterFactory
{
    public static function getFilter($filter, $filter_data)
    {
        switch ($filter) {
            case 'Currency':
                return new Currency($filter_data);
                break;
            case 'Range':
                return new Range($filter_data);
                break;
            case 'statusCode':
                return new Status($filter_data);
                break;
            default:
              return  [] ;
                break;
        }
    }
}




