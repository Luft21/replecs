<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class SesiSpk extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'sesi_spk';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_user',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // public function hasilSpk(): HasMany
    // {
    //     return $this->hasMany(HasilSpk::class, 'id_sesi', 'id');
    // }

    // public function bobotKriteria(): HasMany
    // {
    //     return $this->hasMany(BobotKriteria::class, 'id_sesi', 'id');
    // }
}
