<?php

namespace App\Models;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialty_id',
        'license_number',
        'phone',
        'qualification',
        'experience_years',
        'consultation_fee',
        'bio',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'experience_years' => 'integer',
            'consultation_fee' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }
}
