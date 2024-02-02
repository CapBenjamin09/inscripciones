<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchedulesDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'hour',
        'course',
        'teacher',
        'schedule_id',
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}

