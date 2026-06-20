<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'partner_id',
        'debit_id',
        'amount',
        'period',
        'due_date',
        'status'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function debit()
    {
        return $this->belongsTo(Debit::class)->withTrashed();;
    }
}
