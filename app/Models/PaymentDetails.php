<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetails extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payment_id',
        'product',
        'note',
        'price',
    ];
}
