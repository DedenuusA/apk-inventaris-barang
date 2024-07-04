<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPinjaman extends Model
{
    protected $table = "detail_pinjamans";
    use HasFactory;
    protected $guarded = ['id'];

    public function pinjaman() : BelongsTo {
        return $this->belongsTo(Pinjaman::class);
    }
    public function item() : BelongsTo {
        return $this->belongsTo(Item::class);
    }
    public function perusahaan() : BelongsTo {
        return $this->belongsTo(Perusahaan::class);
    }
}