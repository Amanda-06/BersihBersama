<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_tag',
    ];

    /*
    |--------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------
    */

    /**
     * Relasi Many-to-Many: 1 tag bisa dipakai di banyak reports,
     * lewat pivot table report_tag.
     */
    public function reports(): BelongsToMany
    {
        return $this->belongsToMany(Report::class, 'report_tag')
            ->withTimestamps();
    }
}