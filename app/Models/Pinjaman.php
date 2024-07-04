<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pinjaman extends Model
{
    protected $table = "pinjamans";
    use HasFactory;
    protected $guarded = ['id'];

     public function user() : BelongsTo {
        return $this->belongsTo(user::class);
    }
    public function detail_pinjamans() {
        return $this->hasMany(DetailPinjaman::class,'pinjaman_id', 'id');
    }
    public function item() : BelongsTo {
        return $this->belongsTo(Item::class);
    }

}
