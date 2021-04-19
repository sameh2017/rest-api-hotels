<?php


namespace App\Domain\Pipelines;


use App\Domain\Services\Classes\ClientRequest;

class PrepareGuzzleClientForAvailableHotelsPipeline implements Pipeline
{
    public function handle($data, \Closure $next)
    {
        $guzzelRequest = new ClientRequest();
        $clientRequest = $guzzelRequest->hotels();
        try{
            $response =  $clientRequest['client']->get($clientRequest['path'], [
                $clientRequest['body']
            ]);

            $decodedResponse =  json_decode($response->getBody()->getContents(), true);
            $results =  $decodedResponse['data'];

        } catch (\Exception $e){
            $results = ['Error' => $e->getMessage()];
        }


        return $next([
            'response'=>$results,
            'data'=>$data
        ]);
    }

}
