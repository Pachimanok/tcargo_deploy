<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\State;
use App\City;
use Illuminate\Support\Facades\Redirect;

class CountryController extends Controller
{
    public function get_city($id) {
        $city = City::find($id);
        return array(
            'city_id'=>$city->id,
            'state_id'=>$city->state->id,
            'country_id'=>$city->state->country->id,
        );
    }    

    public function get_cities($id) {
        $cities = City::where("state_id", $id)->pluck("city", "id");
        $cities = ['0' => __('nav.select_option')] + $cities->all();
        return $cities;
    }    

    public function get_states($country_id) {
        $states = State::where('country_id', $country_id)->pluck("state", "id");
        $states = ['0' => __('nav.select_option')] + $states->all();
        return $states;        
    }    

    public function get_countries(){
        $countries = Country::pluck("country", "id");
        $countries = ['0' => __('nav.select_option')] + $countries->all();
        return $countries;
    }

}
