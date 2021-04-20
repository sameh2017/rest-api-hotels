<?php

namespace Tests\Feature;

use Tests\TestCase;

class HotelTest extends TestCase
{


    /**
     *function to test get all Hotels By hotelname
     * @author samehelshal
     * @todo assert json response
     */
    public function testGetAllUserByHotelNameSuccessfully()
    {
        $data = [
            "hotel_name" => "Annalise"
        ];
        $response=  $this->json('POST', 'api/v1/hotel_name', $data, ['Accept' => 'application/json'])
            ->assertStatus(200);


    }


    /**
     *function to test get all hotels By Status Code
     * @author samehelshal
     * @todo assert json response
     */
    public function testGetAllHotelsByCitySuccessfully()
    {
        $data = [
            "city_name" => "cairo"
        ];
        $this->json('POST', 'api/v1/hotel_city', $data, ['Accept' => 'application/json'])
            ->assertStatus(200);

    }

    /**
     *function to test get all hotels By Range
     * @author samehelshal
     * @todo assert json response
     */
    public function testGetAllHotelByRangeSuccessfully()
    {
        $data = [
            "balanceMin" => 400,
            "balanceMax" => 1000

        ];

        $this->json('POST', 'api/v1/hotel_range', $data, ['Accept' => 'application/json'])
            ->assertStatus(200);

    }
}
