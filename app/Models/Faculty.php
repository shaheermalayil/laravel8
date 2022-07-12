<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Faculty extends Model
{
    use LogsActivity;
    use HasFactory;
    const ACTIVE = 1;
    const NOTACTIVE = 0;
    public $timestamps = false;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','status','user_id'];
    protected static $recordEvents = ['deleted','created','updated'];
    /**
     * Get the papers for the faculty.
     */
    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
    public function getActivitylogOptions()
    {
        return LogOptions::defaults()
        // ->logOnly(['name', 'text'])
        ->logOnlyDirty();
    }
}
