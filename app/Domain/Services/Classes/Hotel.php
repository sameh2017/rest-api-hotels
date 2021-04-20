<?php


namespace App\Domain\Services\Classes;
use App\Domain\Pipelines\PrepareGuzzleClientForAvailableHotelsPipeline;
use App\Domain\Pipelines\FilterDataPipeline;
use App\Domain\Pipelines\SortDataPipeline;
use Illuminate\Pipeline\Pipeline;


class Hotel extends  Service
{
    private $pipes ;
    public function handle($data = [])
    {

        $this->pipes=[
            PrepareGuzzleClientForAvailableHotelsPipeline::class,
            isset($data['filter_key'] ) ? FilterDataPipeline::class : SortDataPipeline::class ,
        ];

            $data= app(Pipeline::class)->send($data)->through($this->pipes)->then(function ($data){
                return$data;
            });
            return $data;




    }

}
