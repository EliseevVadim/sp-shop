<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PHPHtmlParser\Dom;

class ProductController extends Controller
{
    public function searchProducts($wordToSearch): JsonResponse
    {
        try {
            $extraCoefficient = config('app.extra_charge');
            $rootUrl = config('app.search_api_resource');
            $requestingUrl = $rootUrl . $wordToSearch;
            $initialData = json_decode(Http::get($requestingUrl)->body())->items;
            $currencyCoefficient = $this->getRublesToUsdCoefficient();
            foreach ($initialData as $element) {
                $element->price = round($element->price / $currencyCoefficient * $extraCoefficient, 2);
                $element->url = $element->itemId;
            }
            return response()->json($initialData);
        }
        catch (\Exception $exception) {
            return response()->json([
                'result' => 'Items not found'
            ], 404);
        }

    }

    public function loadInitialProducts()
    {
        $rootUrl = config('app.external_trending_link');
        $countryCode = config('app.country_code');
        $extraCoefficient = config('app.extra_charge');
        $requestUrl = $rootUrl . $countryCode;
        $data = json_decode(Http::get($requestUrl)->body());
        foreach ($data as $element) {
            $element->displayName = $element->name;
            $element->discountPrice = round($element->discountedPriceAmount *  $extraCoefficient, 2);
        }
        return response()->json($data);
    }

    public function loadProductsByCategoryId($id) {
        $rootUrl = config('app.products_in_category_link');
        $countryCode = config('app.country_code');
        $extraCoefficient = config('app.extra_charge');
        $requestUrl = str_replace('*', $countryCode, $rootUrl) . $id;
        $data = json_decode(Http::get($requestUrl)->body())->products->country;
        foreach ($data as $element) {
            $element->displayName = $element->name;
            $element->discountPrice = round($element->discountedPriceAmount *  $extraCoefficient, 2);
        }
        return response()->json($data);
    }

    private function getRublesToUsdCoefficient() {
        $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
        return $rates->Valute->USD->Value;
    }
}
