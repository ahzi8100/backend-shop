<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    public function getProvince()
    {
        $provinces = Province::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Provinces',
            'data' => $provinces
        ]);
    }

    public function getCities(Request $request)
    {
        $city = City::where('province_id', $request->province_id)->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Cities By Province',
            'data' => $city
        ]);
    }

    public function checkOngkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => config('services.rajaongkir.key')
        ])->post('http://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->city_destination,
            'weight' => $request->weight,
            'courier' => $request->courier
        ]);

        return response()->json([
            'success' => true,
            'message' => 'List Data Cost All Courier: '.$request->courier,
            'data' => $response['rajaongkir']['results'][0]
        ]);
    }
}
