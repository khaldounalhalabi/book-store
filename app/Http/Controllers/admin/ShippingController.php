<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ShippingRequest;
use App\Http\Resources\CountryCodeResource;
use App\Http\Resources\CountryResource;
use App\Models\Book;
use App\Models\Shipping;
use Cache;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ShippingController extends Controller
{
    public function getCountries(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $data = Shipping::inRandomOrder()->get();
        } else {
            $data = Shipping::where('country', 'like', '%'.$search.'%')
                ->orWhere('country_code', 'like', '%'.$search.'%')
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
            $data = Shipping::where('country', 'like', '%'.$search.'%')->get();
        }
        $response = CountryCodeResource::collection($data);

        return response()->json($response);
    }

    public function getShippingCostByCountryName(Request $request)
    {
        $countryName = $request->countryName;
        $shippingInfo = Cache::get('shipping-'.$countryName);

        if (! $shippingInfo) {
            $shippingInfo = Shipping::where('country', $countryName)->first();
            // Cache the shipping cost information for 24 hours
            Cache::put('shipping-'.$countryName, $shippingInfo, 1440 * 7);
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

    public function store(ShippingRequest $request)
    {
        $data = $request->validated();
        Shipping::create($data);

        return redirect()->back();
    }

    public function data(): \Illuminate\Http\JsonResponse
    {
        $shipping = Shipping::select(['id', 'country', 'country_code', 'shipping_cost']);

        return DataTables::eloquent($shipping)
            ->addColumn('action', function ($info) {
                return "
                   <div class='d-flex'>
                        <div class='p-1'>
                            <a href='".route('admin.shipping.show', $info->id)."' class='btn btn-xs btn-info w-auto h-auto m-auto'>
                                <i class='bi bi-chevron-bar-right'></i>
                            </a>
                        </div>
                        <div class='p-1'>
                            <button type='button' class='btn btn-xs btn-danger remove-item-from-table-btn w-auto h-auto m-auto'
                                    data-deleteurl ='".route('admin.books.destroy', $info->id)."' >
                                <i class='bi bi-trash3-fill'></i>
                            </button>
                        </div>
                    </div>";
            })
            ->toJson();
    }

    public function show($shipping_id)
    {
        $shipping = Shipping::findOrFail($shipping_id);

        return view('admin.shipping.show', compact('shipping'));
    }

    public function edit($shipping_id)
    {
        $shipping = Shipping::findOrFail($shipping_id);

        return view('admin.shipping.edit', compact('shipping'));
    }

    public function update(ShippingRequest $request, $shipping_id)
    {
        $shipping = Shipping::findOrFail($shipping_id);
        $data = $request->validated();
        $shipping->update($data);

        return view('admin.shipping.show', compact('shipping'));
    }
}
