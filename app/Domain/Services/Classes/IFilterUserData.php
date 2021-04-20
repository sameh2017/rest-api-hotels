<?php


namespace App\Domain\Services\Classes;


abstract class IFilterUserData
{

    protected $filter;

    public function __construct(string $filter)
    {
        $this->filter = $filter;
    }
    abstract public  function getFilterJsonData($filter , $filter_data) : array;

}
