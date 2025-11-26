<?php

namespace App\Models;

use App\Models\AssignedDebit;
use App\Models\Debits;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class DebitInstance extends Model
{
    protected $table = 'debit_instances';

    protected $fillable = [
        'name',
        'debits_id',
        'due_date',
        'amount',
    ];

    protected $dates = ['due_date'];

    public function debit(): BelongsTo
    {
        return $this->belongsTo(Debits::class);
    }

    public function assignedDebits(): HasMany
    {
        return $this->hasMany(AssignedDebit::class);
    }
}
