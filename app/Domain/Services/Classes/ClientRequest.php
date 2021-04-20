<?php


namespace App\Domain\Services\Classes;


use GuzzleHttp\Client;


/**
 * Class ClientRequest
 * @package App\Domain\Services\Classes
 */
class ClientRequest
{

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Client
     */
    protected $client;
    /**
     * @var string[]
     */
    protected $header;

    /**
     * ClientRequest constructor.
     */
    public function __construct()
    {


        $this->url = 'https://run.mocky.io/v3/0d6aab31-bb68-4d89-acc5-bc4148a3cff3';

        $this->header = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'cache-control' => 'no-cache',
            'accept' => 'application/json'
        ];
        $client = new Client(['base_uri' => $this->url,  'headers' => $this->header]);
        $this->client = $client;

    }

    /**
     * @return array
     */
    public function hotels()
    {

        $request = [
            'client' => $this->client,
            'path' => $this->url ,
            'body' => ['body' => []],
            'method' => 'POST',
        ];

        return $request;
    }

}
