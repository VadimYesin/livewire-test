<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    public const INPUT_TEXT_TYPE = 1;
    public const INPUT_NUMBER_TYPE = 2;
    public const INPUT_CHECKBOX_TYPE = 3;
    public const INPUT_DROPDOWN_TYPE = 4;

    protected $fillable = [
        'survey_id',
        'title',
        'type',
        'options',
    ];

    // ----- Relations -----
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    protected function options(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value),
            set: fn (array $value) => json_encode($value),
        );
    }

    public static function getInputTypes(): array
    {
        return [
            self::INPUT_TEXT_TYPE,
            self::INPUT_NUMBER_TYPE,
            self::INPUT_CHECKBOX_TYPE,
            self::INPUT_DROPDOWN_TYPE,
        ];
    }
}
