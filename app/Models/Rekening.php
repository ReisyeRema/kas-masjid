<?php

namespace App\Models;

use App\Models\PemasukanMasjid;
use App\Models\PemasukanSosial;

use App\Models\PengeluaranMasjid;
use App\Models\PengeluaranSosial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rekening extends Model
{
    use softDeletes;

    protected $table = 'rekening';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_bank',
        'no_rek',
    ];

    public function pemasukanMasjid()
    {
        return $this->hasMany(PemasukanMasjid::class);
    }

    public function pengeluaranMasjid()
    {
        return $this->hasMany(PengeluaranMasjid::class);
    }

    public function pemasukanSosial()
    {
        return $this->hasMany(PemasukanSosial::class);
    }

    public function pengeluaranSosial()
    {
        return $this->hasMany(PengeluaranSosial::class);
    }
}
