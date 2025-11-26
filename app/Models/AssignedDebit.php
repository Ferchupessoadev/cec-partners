<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class AssignedDebit extends Model
{
    protected $table = 'assigned_debits';

    protected $fillable = [
        'partner_id',
        'debit_instances_id',
        'status',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function debitInstance(): BelongsTo
    {
        return $this->belongsTo(DebitInstance::class, 'debit_instances_id');
    }
}
