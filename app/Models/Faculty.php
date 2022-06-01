<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    const ACTIVE = 1;
    const NOTACTIVE = 0;
    public $timestamps = false;

    /**
     * Get the papers for the faculty.
     */
    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
}
