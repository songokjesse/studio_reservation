<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['course_code', 'course_title', 'comments', 'user_id', 'start_time', 'finish_time'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
