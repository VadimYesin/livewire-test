<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitOfAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_id',
        'title'
    ];

    // ----- Relations -----
    public function submissions(): HasMany
    {
        return $this->hasMany(Submissions::class, 'id', 'uoa_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
