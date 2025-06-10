<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class HasilSpk extends Model
{
    use HasFactory;

    protected $table = 'hasil_spk';

    protected $fillable = [
        'id_sesi',
        'id_laptop',
        'nilai_S',
        'nilai_R',
        'nilai_Q',
    ];

    public function sesiSpk()
    {
        return $this->belongsTo(SesiSpk::class, 'id_sesi', 'id');
    }

    public function laptop()
    {
        return $this->belongsTo(Laptop::class, 'id_laptop', 'id');
    }
}