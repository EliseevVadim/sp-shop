<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function addOrder(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'userName' => 'required|string',
            'userPhone' => 'required|string',
            'total' => 'required',
            'orderData' => 'required'
        ]);
        if ($validator->fails())
            return response()->json([
               'errors' => $validator->errors()
            ], 400);
        Order::create($input);
        return response()->json([
            'success' => true
        ]);
    }
}
