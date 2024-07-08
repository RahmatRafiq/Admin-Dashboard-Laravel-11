<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMingguan extends Model
{
    use HasFactory;

    protected $table = 'laporan_mingguan';
    protected $fillable = [
        'peserta_id',
        'mitra_id',
        'dospem_id',
        'lowongan_id',
        'minggu_ke',
        'isi_laporan',
        'status',
        'kehadiran',
        'feedback',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function mitra()
    {
        return $this->belongsTo(MitraProfile::class);
    }

    public function dospem()
    {
        return $this->belongsTo(DosenPembimbingLapangan::class, 'dospem_id', 'id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function laporanHarian()
    {
        return $this->hasMany(LaporanHarian::class, 'minggu_ke', 'minggu_ke');
    }
    public static function getByUser($user, $pesertaId = null)
    {
        $query = self::with(['peserta', 'mitra'])
            ->whereHas('mitra', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });

        if ($pesertaId) {
            $query->where('peserta_id', $pesertaId);
        }

        return $query->get();
    }
}
