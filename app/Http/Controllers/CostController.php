<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CostController extends Controller
{
    public function cekOngkir(Request $request)
    {
        if($request->origin && $request->originType && $request->destination && $request->destinationType && $request->weight && $request->courier) {
            
            $origin = $request->origin;
            $originType = $request->originType;
            $destination = $request->destination;
            $destinationType = $request->destinationType;
            $weight = $request->weight;
            $courier = implode(':', $request->courier);

            $response = Http::asForm()->withHeaders([
                'key' => env('API_KEY')
            ])->post('https://pro.rajaongkir.com/api/cost', [
                'origin' => $origin,
                'originType' => $originType,
                'destination' => $destination,
                'destinationType' => $destinationType,
                'weight' => $weight,
                'courier' => $courier
            ]);

            $checkCost = collect(data_get(json_decode($response, true), 'rajaongkir.results', []))
                ->flatMap(fn ($results) => collect($results['costs'])->map(fn ($costs) => [
                    'name' => $results['name'],
                    'service' => $costs['service'],
                    'description' => $costs['description'],
                    'value' => $costs['cost'][0]['value'],
                    'etd' => $costs['cost'][0]['etd'],
                    'note' => $costs['cost'][0]['note'],
                    ]))
                ->sortBy(['name', 'value'])
                ->values();
        } else {
            $origin = '';
            $originType = '';
            $destination = '';
            $destinationType = '';
            $weight = '';
            $courier = '';
            $checkCost = NULL;
        }

        $listCourier = [
        'jne', 'pos', 'tiki', 'rpx', 'pandu', 'wahana', 'sicepat',
        'jnt', 'pahala', 'sap', 'jet', 'indah', 'dse', 'slis', 'expedito', 'first',
        'ncs', 'star', 'ninja', 'lion', 'idl', 'rex', 'ide', 'sentral',
        'anteraja', 'jtl'
        ];

        $province = Province::all();

        return view('cek-ongkir', compact('province', 'checkCost', 'listCourier'));
    }

    public function getCityAjax($id)
    {
        $cities = City::select(DB::raw("CONCAT(type,' ',city_name) AS city"),'id')->where('province_id', '=', $id)->pluck('city', 'id');

        return json_encode($cities);
    }

    public function getSubdistrictAjax($id)
    {
        $response = Http::withHeaders([
            'key' => env('API_KEY')
        ])->get('https://pro.rajaongkir.com/api/subdistrict?city='.$id);

        $subdistricts = $response['rajaongkir']['results'];

        $option = "<option value='' selected hidden disabled> -- Pilih Kecamatan -- </option>";
        foreach ($subdistricts as $subdistrict) {
            $option.= "<option value='" . $subdistrict['subdistrict_id'] . "'>" . $subdistrict['subdistrict_name'] . "</option>";
        }
        return $option;
    }

    public function cekResi(Request $request)
    {
        if($request->waybill && $request->courier) {
            
            $waybill = $request->waybill;
            $courier = $request->courier;

            $response = Http::asForm()->withHeaders([
                'key' => env('API_KEY')
            ])->post('https://pro.rajaongkir.com/api/waybill', [
                'waybill' => $waybill,
                'courier' => $courier
            ]);

            $summary = data_get(json_decode($response, true), 'rajaongkir.result.summary');

            // $trackPackage = collect(data_get(json_decode($response, true), 'rajaongkir.result.manifest', []))
            //     ->flatMap(fn ($results) => collect($results['summary'])->map(fn ($summary) => [
            //         'waybill_number' => $summary['waybill_number'],
            //         'service_code' => $summary['service_code'],
            //         'destination' => $summary['destination'],
            //         'receiver_name' => $summary['receiver_name'],
            //         'waybill_date' => $summary['waybill_date'],
            //         'status' => $summary['status'],
            //         ]))
            //     ->values();
        } else {
            $waybill = '';
            $courier = '';
            $trackPackage = NULL;
        }

        $listCourier = [
        'pos', 'wahana', 'sicepat', 'jnt', 'sap', 'jet', 'indah', 'dse', 'first', 'ncs', 'ninja', 'lion', 'idl', 'rex', 'ide', 'sentral', 'anteraja', 'jtl'
        ];

        return view('cek-resi', compact('summary', 'listCourier'));
    }
}
