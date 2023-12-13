<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'uoa_id',
        'answer',
    ];

    // ----- Relations -----
    public function unit(): BelongsTo
    {
        return $this->belongsTo(UnitOfAnalysis::class, 'uoa_id', 'id');
    }
}
