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

}

