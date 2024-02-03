<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

}
