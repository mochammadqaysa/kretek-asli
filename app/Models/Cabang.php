<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "cabang";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uid',
        'nama',
        'alamat',
        'created_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function terapis()
    {
        return $this->hasMany(Terapis::class, 'cabang_uid', 'uid');
    }
}
