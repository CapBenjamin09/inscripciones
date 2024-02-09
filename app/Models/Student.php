<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'cui',
        'student_personal_code',
        'name',
        'lastname',
        'birthdate',
        'incharge',
        'phone_incharge',
        'address',
        'status_student',
        'degree_id',
    ];

    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registrations::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

}
