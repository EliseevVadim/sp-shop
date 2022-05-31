<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class ProductController extends Controller
{
    public function searchProducts($wordToSearch): JsonResponse
    {
        $extraCoefficient = config('app.extra_charge');
        $rootUrl = config('app.external_api_resource');
        $categoriesUrl = config('app.external_dom_link');
        $requestingUrl = $rootUrl . $wordToSearch;
        $initialData = json_decode(Http::get($requestingUrl)->body())->items;
        $dom = new Dom();
        $dom->loadFromUrl($categoriesUrl . $wordToSearch);
        $code = $dom->outerHtml;
        $dom->loadStr($code);
        $categories = $dom->find('span.cat_name');
        $categoriesArray = [];
        foreach ($categories as $category) {
            array_push($categoriesArray, $category->text);
        }
        foreach ($initialData as $element) {
            $element->price = round($element->price * $extraCoefficient, 2);
        }
        array_push($initialData, $categoriesArray);
        return response()->json($initialData);
    }

    public function loadInitialProducts()
    {
        $dom = new Dom();
        $dom->loadFromUrl(config('app.external_site'));
        $htmlResponse = $dom->outerHtml;
        return response()->json([]);
    }
}
