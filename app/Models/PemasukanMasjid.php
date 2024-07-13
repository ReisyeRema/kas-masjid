<?php

namespace App\Models;

use App\Models\Rekening;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemasukanMasjid extends Model
{
    use softDeletes;

    protected $table = 'pemasukan_masjid';

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
