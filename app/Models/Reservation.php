<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['staff_name','staff_email','staff_phone','course_code', 'course_title', 'comments', 'reservation_date', 'school_id', 'start_time', 'finish_time'];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
