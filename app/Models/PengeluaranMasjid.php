<?php

namespace App\Models;

use App\Models\Rekening;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\SoftDeletes;


class PengeluaranMasjid extends Model
{
    use softDeletes;

    protected $table = 'pengeluaran_masjid';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uraian',
        'jumlah',
        'tanggal',
        'rekening_id',
    ];

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }
}
