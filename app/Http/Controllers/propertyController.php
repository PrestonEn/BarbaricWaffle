<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class propertyController extends Controller
{
    function add(Request $request){
        $this->validate($request, [
            'address_name' => 'required',
            'postalCode_name' => 'required',
            'city_name' => 'required',
            'province_name' => 'required',
            'country_name' => 'required'
        ]);

        $json_raw = Input::get('maps_json_name');
        $json_obj = json_decode($json_raw);

        $city = '';
        $country = '';
        $province = '';
        $street_num = '';
        $street_name = '';
        $postal_code = '';

        $lat = $json_obj[0]->geometry->location->lat;
        $lng = $json_obj[0]->geometry->location->lng;

        foreach ($json_obj[0]->address_components as $comp) {
            echo $comp->types[0] + "</br>";
            switch ($comp->types[0]) {
                case 'street_number': //STREET NUMBER
                    $street_num = $comp->long_name;
                    break;
                case 'route':   //STREET NAME
                    $street_name = $comp->long_name;
                    break;
                case 'administrative_area_level_1': //STATE/PROVINCE
                    $province = $comp->long_name;
                    break;
                case 'postal_code': //POSTAL CODE
                    $postal_code = $comp->long_name;
                    break;
                case 'country': //COUNTRY
                    $country = $comp->long_name;
                    break;
                case 'neighborhood':
                case 'locality':
                    $city = $comp->long_name;
                    break;

            }
        }

        if($city == '' | $country == '' | $province == '' | $street_name == '' | $street_num == '' | $postal_code == ''){
            return redirect('addProperty')->withErrors(["We can't find your full address, please update your info and resubmit"]);
        }

    }
}
