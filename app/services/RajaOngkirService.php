<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.rajaongkir.endpoint');
        $this->apiKey = config('services.rajaongkir.key');
    }

    public function getProvinces()
    {
        $response = Http::withHeaders([
            'key' => $this->apiKey,
        ])->get($this->baseUrl . '/province');
    
        if ($response->successful()) {
            return $response->json()['rajaongkir']['results'];
        }
    
        return [];
    }
    
    public function getCities($province_id)
    {
        $response = Http::withHeaders([
            'key' => $this->apiKey,
        ])->get($this->baseUrl . '/city', [
            'province' => $province_id,
        ]);
    
        if ($response->successful()) {
            return $response->json()['rajaongkir']['results'];
        }
    
        return [];
    }

    public function getShippingCost($origin, $destination, $weight, $courier)
    {
        $response = Http::withHeaders([
            'key' => $this->apiKey,
        ])->post($this->baseUrl . '/cost', [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ]);

        if ($response->successful()) {
            return $response->json()['rajaongkir']['results'];
        }

        return null;
    }
}