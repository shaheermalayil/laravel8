<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    /**
     * Get faculty of the paper
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
