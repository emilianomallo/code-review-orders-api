<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable = ['number', 'status', 'email', 'shipping_address', 'products', 'total'];

}
