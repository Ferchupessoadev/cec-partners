<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partner';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'sexo',
        'active',
        'address',
        'dni',
        'date_of_birth',
        'date_of_registration',
    ];

    protected function casts()
    {
        return [
            'date_of_birth' => 'date',
            'date_of_registration' => 'date',
        ];
    }

    public function assignedDebits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AssignedDebit::class);
    }
}
