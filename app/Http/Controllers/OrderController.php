<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller 
{

    public function index() {
        return Order::all();
    }

    public function show($id) {
        return Order::findOrFail($id);
    }

    public function store(Request $request) {
        $a = $request->all();

        $input_verify = true;

        // Validate input
        foreach($a as $b => $c) {
            if($b === "number") {
                if(!is_numeric($c) || $c <= 0) {
                    $input_verify = false;
                }
            } else if ($b == "status") {
                if(is_null($c) || !is_string($c) || empty($c) || isset($c) == false) {
                    $input_verify = false;
                } else {
                    $input_verify = true;
                }
            } else if ($b == "email") {
                if(is_null($email = $c)) {
                    $input_verify = false;
                } else {
                    continue;
                }
            } else {
                if(array_key_exists('products', $a) == false) {
                   $input_verify = false;
                }
            }
        }

        $response = "";

        if($input_verify == true) {
            $order = Order::create($a);
            $response = $order;
        } else {
            $response = "ERROR";
        }

        return response()->json($response, Response::HTTP_CREATED);
    }

}

