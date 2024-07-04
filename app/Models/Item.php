<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategori() : BelongsTo {
        return $this->belongsTo(Kategori::class);
    }
    public function perusahaan() : BelongsTo {
        return $this->belongsTo(Perusahaan::class);
    }

static public function sinkronsisa()
{
            $items = Item::selectRaw('items.id, sum(jumlah) as sum')->leftJoin('detail_pinjamans', 'detail_pinjamans.item_id', '=', 'items.id')->groupBy('items.id', 'items.nama_item', 'detail_pinjamans.jumlah')->get();

        foreach ($items as $itemm) {
            if ($itemm->sum==null) {
                Item::find($itemm->id)->update(['sisa'=>DB::raw('stok')]);
            } else {
                Item::find($itemm->id)->update(['sisa'=>DB::raw('stok - '.$itemm->sum)]);
            }
        }
}
}
