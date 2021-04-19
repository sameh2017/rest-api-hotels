<?php


namespace App\Domain\Pipelines;


use GuzzleHttp\Client;
use GuzzleHttp\Promise;
class SortDataPipeline implements Pipeline
{
    public function handle($data, \Closure $next)
    {


        usort($data['response'], function($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        return $next([
            'response'=>$data,
        ]);
    }

}
