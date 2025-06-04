<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilSpk extends Model
{
    use HasFactory;

    protected $table = 'hasil_spk';
    public $incrementing = false;
    protected $primaryKey = ['id_sesi', 'id_laptop'];

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