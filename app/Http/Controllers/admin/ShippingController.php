<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryCodeResource;
use App\Http\Resources\CountryResource;
use App\Models\Book;
use App\Models\Shipping;
use Cache;
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

    public function getShippingCostByCountryName(Request $request)
    {
        $countryName = $request->countryName;
        $shippingInfo = Cache::get('shipping-' . $countryName);

        if (!$shippingInfo) {
            $shippingInfo = Shipping::where('country', $countryName)->first();
            // Cache the shipping cost information for 24 hours
            Cache::put('shipping-' . $countryName, $shippingInfo, 1440 * 7);
        }

        if (auth()->user()) {
            $user = auth()->user();

            $userCart = $user->cart()->with('book')->get();

            $costWithoutShipping = $userCart->sum(function ($item) {
                return $item->book->price;
            });
            $orderedBooksCount = $userCart->count();

            $costWithShipping = $costWithoutShipping >= 65 ? $costWithoutShipping : $costWithoutShipping + $shippingInfo->shipping_cost * $orderedBooksCount;

        } else {
            $book = Book::findOrFail($request->book_id);

            $costWithShipping = $book->price >= 65 ? $book->price : $book->price + $shippingInfo->shipping_cost;
        }

        return response()->json($costWithShipping);
    }
}
