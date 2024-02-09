<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'date',
        'cycle',
        'paid_registration',
        'voucher_record',
        'comments',
        'degree_id',
        'status'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function degree(): BelongsTo
    {
        return $this->belongsTo(Degree::class);
    }
}
