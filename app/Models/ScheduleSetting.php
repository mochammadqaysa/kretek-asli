<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleSetting extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = null;
    public $timestamps = false;
    protected $table = "schedule_settings";
    protected $fillable = [
        'meta_field',
        'meta_value',
    ];
}
