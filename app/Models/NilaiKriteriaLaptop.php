<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NilaiKriteriaLaptop extends Model
{
    use HasFactory;

    protected $table = 'nilai_kriteria_laptop';

    public $incrementing = false;

    protected $fillable = [
        'id_kriteria',
        'id_laptop',
        'nilai',
    ];

    protected $casts = [
        'nilai' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
