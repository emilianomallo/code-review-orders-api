<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable = ['number', 'status', 'email', 'shipping_address', 'products', 'total'];

}
