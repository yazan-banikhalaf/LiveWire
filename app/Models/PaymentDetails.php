<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class , 'payment_id');
    }
}
