<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    /** @use HasFactory<\Database\Factories\AnnouncementFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'tipe',
        'isi',
    ];

    /*
    |--------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------
    */

    /**
     * Relasi: Announcement ini dibuat oleh 1 user (admin).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------
    | Helper Tipe (dipakai di Blade untuk label tampilan)
    |--------------------------------------------------------------------
    */

    /**
     * Label tipe yang lebih enak dibaca di tampilan (bukan snake_case mentah).
     */
    public function labelTipe(): string
    {
        return match ($this->tipe) {
            'jadwal_kerja_bakti' => 'Jadwal Kerja Bakti',
            'jadwal_truk_sampah' => 'Jadwal Truk Sampah',
            'himbauan'           => 'Himbauan',
            default              => ucfirst($this->tipe),
        };
    }
}