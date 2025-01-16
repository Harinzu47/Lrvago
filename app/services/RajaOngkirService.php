<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('RAJAONGKIR_API_KEY');
    }

    public function getProvinces()
    {
        $response = Http::withHeaders(['key' => $this->apiKey])
            ->get('https://api.rajaongkir.com/starter/province');

        return $response->json()['rajaongkir']['results'] ?? [];
    }

    public function getCities($provinceId)
    {
        $response = Http::withHeaders(['key' => $this->apiKey])
            ->get('https://api.rajaongkir.com/starter/city', [
                'province' => $provinceId
            ]);

        return $response->json()['rajaongkir']['results'] ?? [];
    }

    public function calculateShippingCost($origin, $destination, $weight, $courier)
    {
        $response = Http::withHeaders(['key' => $this->apiKey])
            ->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
            ]);

        return $response->json();
    }
}