<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Laptop extends Model
{
    use HasUuids;

    protected $table = 'laptop';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'merek',
        'specs',
        'gambar',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function nilaiKriteriaLaptop(): HasMany
    {
        return $this->hasMany(NilaiKriteriaLaptop::class, 'id_laptop', 'id');
    }
}
