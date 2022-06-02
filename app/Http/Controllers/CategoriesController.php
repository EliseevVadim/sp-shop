<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriesController extends Controller
{
    public function loadAllCategories(): JsonResponse
    {
        $rootUrl = config('app.categories_list_link');
        $countryCode = config('app.country_code');
        $requestUrl = $rootUrl . $countryCode;
        $data = json_decode(Http::get($requestUrl)->body())->categories;
        return response()->json($data);
    }
}
