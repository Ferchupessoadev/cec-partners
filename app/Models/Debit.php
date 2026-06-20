<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'amount',
    ];

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
