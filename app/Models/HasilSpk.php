<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class HasilSpk extends Model
{
    use HasFactory;
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });

        // Auto-update rankings when a record is created
        static::created(function ($model) {
            self::updateRankingForSession($model->id_sesi);
        });

        // Auto-update rankings when a record is updated
        static::updated(function ($model) {
            if ($model->isDirty('nilai_Q')) {
                self::updateRankingForSession($model->id_sesi);
            }
        });

        // Auto-update rankings when a record is deleted
        static::deleted(function ($model) {
            self::updateRankingForSession($model->id_sesi);
        });
    }

    protected $table = 'hasil_spk';

    protected $primaryKey = 'id'; // single primary key
    public $incrementing = false; // because UUID is not incrementing
    protected $keyType = 'string'; // UUID is string

    protected $fillable = [
        'id',
        'id_sesi',
        'id_laptop',
        'nilai_S',
        'nilai_R',
        'nilai_Q',
        'ranking',
    ];

    public function sesiSpk()
    {
        return $this->belongsTo(SesiSpk::class, 'id_sesi', 'id');
    }

    public function laptop()
    {
        return $this->belongsTo(Laptop::class, 'id_laptop', 'id');
    }

    /**
     * Update ranking for all results in a given session based on nilai_Q ascending
     */
    public static function updateRankingForSession(string $sessionId): void
    {
        $results = self::where('id_sesi', $sessionId)
            ->orderBy('nilai_Q', 'asc')
            ->get();

        $rank = 1;
        foreach ($results as $result) {
            // Use updateQuietly to avoid triggering the updated event again
            $result->updateQuietly(['ranking' => $rank++]);
        }
    }
}