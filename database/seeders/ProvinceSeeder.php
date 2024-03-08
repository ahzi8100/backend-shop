<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //fetch Rest API
        $response = Http::withHeaders([
            //api key rajaongkir
            'key' => config('services.rajaongkir.key'),
        ])->get('http://api.rajaongkir.com/starter/province');

        //loop data from rest API
        foreach ($response['rajaongkir']['results'] as $province) {
            //insert ke table province
            Province::create([
                'province_id' => $province['province_id'],
                'name' => $province['province']
            ]);

        }
    }
}
