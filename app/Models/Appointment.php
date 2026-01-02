<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "appointments";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uid',
        'patient_uid',
        'service_uid',
        'cabang_uid',
        'terapis_uid',
        'date_sched',
        'keluhan',
        'status',
        'created_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_uid', 'uid');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_uid', 'uid');
    }

    public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'terapis_uid', 'uid');
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_uid', 'uid');
    }
}
