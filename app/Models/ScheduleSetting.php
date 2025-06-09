<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleSetting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "patient_metas";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uid',
        'patient_uid',
        'meta_field',
        'meta_value',
    ];

    protected $casts = [
        'uid' => 'string',
    ];
}
