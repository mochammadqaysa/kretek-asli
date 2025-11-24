<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "patients";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uid',
        'nama',
        'created_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    // Tambahkan relationship ini
    public function metas()
    {
        return $this->hasMany(PatientMeta::class, 'patient_uid', 'uid');
    }
}
