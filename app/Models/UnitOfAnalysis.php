<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
