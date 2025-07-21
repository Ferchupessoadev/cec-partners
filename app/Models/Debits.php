<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debits extends Model
{
    protected $table = 'debits';

    protected $fillable = [
        'name',
        'amount',
    ];
}
