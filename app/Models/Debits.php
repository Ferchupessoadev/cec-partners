<?php

namespace App\Models;

use App\Models\DebitInstance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debits extends Model
{
    use SoftDeletes;

    protected $table = 'debits';

    protected $fillable = [
        'name',
        'amount',
    ];

    public function debitInstances()
    {
        return $this->hasMany(DebitInstance::class);
    }
}
