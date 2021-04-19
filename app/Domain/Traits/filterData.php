<?php


namespace App\Domain\Traits;


trait filterData
{


    /**
     * functionto get filtered data according to type
     * @param $type
     * @param $filter
     *@author sameh elshal
     * @return array
     */
    public function getJsonDataByFilterType($data ,$type, $filter)
    {
        $return_data = [];

        if (isset($data) && !empty($data)) {
            $end = count($data);
            $start = 0;

                $this->compareFilterData($type ,$return_data , $data,$filter , $start ,$end);


        }
        return $return_data;
    }

    /**
     * Function to get data filtered by range
     * @param $min_range
     * @param $max_range
     * @author sameh elshal
     * @return array
     */
    public function getJsonDataByRange($data ,$type ,$min_range, $max_range)
    {

        $return_data =  $this->filterData($data , $type , $min_range , $max_range);
        return $return_data;

    }

    /**
     * @param $data
     * @param int $min_range
     * @param int $max_range
     * @return array
     */
    private function filterData($data ,$type, $min_range = 0, $max_range = 0){
        $return_data = [];
        if (isset($data) && !empty($data)) {
                $end = count($data);
                $start = 0;
                $this->compareRangeData( $type ,$return_data  , $data ,$min_range, $max_range , $start , $end );

        }
        return $return_data;
    }






    /**
     * @param $return_data
     * @param $type
     * @param $hotel_data
     * @param $min_range
     * @param $max_range
     * @param $start_parentAmount
     * @param $end_parentAmount
     * @return mixed
     */
    private function compareRangeData($type ,&$return_data  , $hotel_data , $min_range, $max_range , $start_parentAmount , $end_parentAmount ){

       if($start_parentAmount < $end_parentAmount){
           $value = $hotel_data[$start_parentAmount] ?? $hotel_data[$end_parentAmount];
           if(isset($hotel_data[$start_parentAmount])){
               if( ($min_range <= $value[$type]) && ($value[$type] <= $max_range) ){
                   $return_data[$value['city']][] = $value;


               }
               $start_parentAmount++ ;
           $this->compareRangeData($type ,$return_data  ,$hotel_data ,$min_range, $max_range , $start_parentAmount , $end_parentAmount);

           }

       }

       return $return_data;
    }


    /**
     * @param $type
     * @param $return_data
     * @param $hotel_data
     * @param $filter
     * @param $start_parentAmount
     * @param $end_parentAmount
     * @return mixed
     */
    private function compareFilterData($type , &$return_data  , $hotel_data , $filter , $start_parentAmount , $end_parentAmount ){


        if($start_parentAmount < $end_parentAmount){
            $value = $hotel_data[$start_parentAmount] ?? $hotel_data[$end_parentAmount];
                if( ($filter === $value[$type])  ){

                    $return_data[$filter][] = $value;
                }

            $start_parentAmount++ ;
            $this->compareFilterData($type ,$return_data  ,$hotel_data ,$filter,  $start_parentAmount , $end_parentAmount);

        }

        return $return_data;
    }

}
