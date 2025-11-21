<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapis extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "terapis";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uid',
        'cabang_uid',
        'nama',
        'created_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_uid', 'uid');
    }
}
