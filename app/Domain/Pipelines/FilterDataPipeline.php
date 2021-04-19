<?php


namespace App\Domain\Pipelines;


use  App\Domain\Services\Factory\FilterGateWayFactory;
class FilterDataPipeline implements Pipeline
{
    public function handle($data, \Closure $next)
    {

        $filterData =( new FilterGateWayFactory($data['data']['filter_key']))->getFilteredHotels($data);

        return $next([
            'responses'=>$filterData,
        ]);
    }

}
