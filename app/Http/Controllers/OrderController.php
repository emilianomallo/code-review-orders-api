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

    public function editOrder(Request $request, $order_id) {
        try {
            $order_from_db = Order::find($order_id);

            if(is_null($order_from_db) == false) {
                // Update all orders fields
                foreach($request->all() as $k => $v) {
                    $order_from_db->$k = $v;
                    $order_from_db->save();
                }
        
                $updatedOrder = Order::find($id);
                return response()->json($updatedOrder, 201);
            }

            return response()->json("", 200);

        } catch (\Exception $e) {
            return response()->json(NULL, Response::HTTP_GATEWAY_TIMEOUT);
        }

        return [];
    }

    public function delete($id) {
        $order = Order::find($id);
        $order->delete($id);
    
        return response()->json(null, 204);
    }

}

