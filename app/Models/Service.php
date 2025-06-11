<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "services";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'uid',
        'nama',
        'deskripsi',
        'harga',
    ];

    protected $casts = [
        'uid' => 'string',
    ];
}
