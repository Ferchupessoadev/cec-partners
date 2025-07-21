<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuotas extends Model
{
    protected $table = 'cuotas';

    protected $fillable = [
        'partner_id',
        'amount',
        'date_of_payment',
        'period',
        'status',
    ];
}
