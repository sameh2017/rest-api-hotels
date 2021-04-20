<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Validator;
Use App\Domain\Services\Classes\Hotel;




class HotelsController extends Controller
{

    /**
     */
    private $hotel_service;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Hotel $services
     * @param Request $request
     */
    public function __construct(Hotel $services, Request $request)
    {
        $this->hotel_service = $services;
        $this->request = $request;
    }

    /**
     * @return json
     */
    public function getAllHotels()
    {

        $data['sort_key'] = $this->request->input('sort_key');
        $data['sort_type'] = $this->request->input('sort_type');
        return response()->json($this->hotel_service->handle($data));
    }

    /**
     * @return json
     */
    public function getAllHotelsByName()
    {

        $result = [];
        $validator = Validator::make($this->request->all(), [
            'hotel_name' => 'required|string',
        ]);
        if ($validator->fails()) {
            $result['Errors'] = $validator->errors();
        }else {
            if ($this->request->has('hotel_name')) {
                $data['filter_key'] = 'HotelName';
                $data['filter_value'] = $this->request->input('hotel_name');

                $result = $this->hotel_service->handle($data);
            }
        }
        return response()->json($result);
    }


    /**
     * @return json
     */
    public function getAllHotelsByCity()
    {

        $result = [];
        $validator = Validator::make($this->request->all(), [
            'city_name' => 'required|string',
        ]);
        if ($validator->fails()) {
            $result['Errors'] = $validator->errors();
        }else {
            if ($this->request->has('city_name')) {
                $data['filter_key'] = 'Destination';
                $data['filter_value'] = $this->request->input('city_name');
                $result = $this->hotel_service->handle($data);
            }
        }
        return response()->json($result);

    }

    /**
     * @return json
     */
    public function getAllHotelsByRange()
    {
        $result = [];
        $inputs = $this->request->all();
        $validator = Validator::make($inputs, [
            'balanceMin' => 'required|integer',
            'balanceMax' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $result['Errors'] = $validator->errors();
        }else{
            if ($this->request->has('balanceMin')) {
                $balance_min = $this->request->input('balanceMin');
                $balance_max = $this->request->input('balanceMax');
                $data['filter_key'] = 'Price';
                $data['filter_value'] = ['min' => $balance_min , 'max' => $balance_max];
                $result = $this->hotel_service->handle($data);
            }
        }





        return response()->json($result);
    }



}
