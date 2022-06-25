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
            $rootLink = config('app.search_api_resource');
            $dom = new Dom();
            $dom->loadFromUrl($rootLink . $wordToSearch);
            $cards = $dom->find('.Product-grid');
            $outputData = [];
            $temporaryDom = new Dom();
            $usdCoefficient = $this->getRublesToUsdCoefficient();
            foreach ($cards as $card) {
                try {
                    $cardCode = $card->innerHtml;
                    $temporaryDom->loadStr($cardCode);
                    $imagePath = 'https://iherb.group/' . $temporaryDom->find('img.js-product-preview-img')->getAttribute('data-src');
                    $name = $temporaryDom->find('.Product-grid_name > a', 0)->text;
                    $url = 'https://iherb.group' . $temporaryDom->find('.Product-grid_name > a', 0)->href;
                    $price = floor(preg_replace("/[^0-9]/", "", $temporaryDom->find('.Product-grid_prices > .price', 0)->text) / $usdCoefficient * $extraCoefficient * 100) / 100;
                    $currencySymbol = '$';
                    array_push($outputData, [
                        'picUrl' => $imagePath,
                        'displayName' => $name,
                        'price' => $price,
                        'url' => $url,
                        'currencySymbol' => $currencySymbol
                    ]);
                }
                catch (\Exception $exception) {
                    continue;
                }
            }
            return response()->json($outputData);
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
