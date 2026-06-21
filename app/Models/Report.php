<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'judul',
        'deskripsi',
        'lokasi',
        'status',
    ];

    /*
    |--------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------
    */

    /**
     * Relasi: Report ini dibuat oleh 1 user (warga).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Report ini termasuk 1 category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi Many-to-Many: Report bisa punya banyak tags,
     * lewat pivot table report_tag.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'report_tag')
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------
    | Query Scopes (mempermudah filter di Controller)
    |--------------------------------------------------------------------
    */

    /**
     * Scope: filter laporan berdasarkan status.
     * Penggunaan: Report::status('menunggu')->get();
     */
    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        return $status ? $query->where('status', $status) : $query;
    }

    /**
     * Scope: filter laporan berdasarkan category_id.
     * Penggunaan: Report::category($id)->get();
     */
    public function scopeCategory(Builder $query, ?int $categoryId): Builder
    {
        return $categoryId ? $query->where('category_id', $categoryId) : $query;
    }

    /**
     * Scope: hanya laporan milik 1 user tertentu.
     * Penggunaan: Report::milikUser($userId)->get();
     */
    public function scopeMilikUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /*
    |--------------------------------------------------------------------
    | Helper Status (dipakai di Controller & Blade)
    |--------------------------------------------------------------------
    */

    /**
     * Cek apakah laporan masih bisa diedit/dihapus oleh warga.
     * Sesuai aturan UI: hanya status "menunggu" yang boleh diubah/dihapus warga.
     */
    public function bisaDiubahWarga(): bool
    {
        return $this->status === 'menunggu';
    }

    /**
     * Label warna badge status, dipakai di Blade biar Controller tetap bersih.
     * Sesuai palet warna "Eco-Fresh Modern" di konsep UI.
     */
    public function badgeClass(): string
    {
        return match ($this->status) {
            'menunggu' => 'bg-amber-100 text-amber-600',
            'diproses' => 'bg-blue-100 text-blue-600',
            'selesai'  => 'bg-emerald-100 text-emerald-600',
            'ditolak'  => 'bg-rose-100 text-rose-600',
            default    => 'bg-slate-100 text-slate-600',
        };
    }
}