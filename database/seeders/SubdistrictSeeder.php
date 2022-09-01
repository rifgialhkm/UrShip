<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Subdistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city_id = City::get('id');
        $response = Http::asForm()->withHeaders([
            'key' => env('API_KEY')
        ])->get('https://pro.rajaongkir.com/api/subdistrict?city='.$city_id);
        $subdistricts = $response['rajaongkir']['results'];

        foreach($subdistricts as $subdistrict){
            $data_subdistrict[] = [
                'id' => $subdistrict['subdistrict_id'],
                'province_id' => $subdistrict['province_id'],
                'city_id' => $subdistrict['city_id'],
                'subdistrict_name' => $subdistrict['subdistrict_name']
            ];
        }

        Subdistrict::insert($data_subdistrict);
    }
}
