<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryCodeResource;
use App\Http\Resources\CountryResource;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function getCountries(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $data = Shipping::inRandomOrder()->get();
        } else {
            $data = Shipping::where('country', 'like', '%' . $search . '%')
                ->orWhere('country_code', 'like', "%" . $search . "%")
                ->get();
        }

        $response = CountryResource::collection($data);
        return response()->json($response);
    }

    public function getCountryCodes(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $data = Shipping::inRandomOrder()->get();
        } else {
            $data = Shipping::where('country', 'like', '%' . $search . '%')->get();
        }
        $response = CountryCodeResource::collection($data);
        return response()->json($response);
    }
}
