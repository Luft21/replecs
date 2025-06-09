<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BobotKriteria extends Model
{
    use HasFactory;

    protected $table = 'bobot_kriteria';
    public $incrementing = false;
    public $timestamps = true;
    
    protected $fillable = [
        'id_kriteria',
        'id_sesi',
        'nilai_bobot',
    ];
    
}
