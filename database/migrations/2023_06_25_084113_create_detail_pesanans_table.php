<?php

use App\Models\Item;
use App\Models\Pinjaman;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjamans', function (Blueprint $table) {
            $table->id();
            $table->integer('perusahaan_id')->nullable();
            $table->integer('pinjaman_id')->nullable();
            $table->foreignIdFor(Item::class)->constrained()->cascadeOnDelete();
            $table->integer('jumlah')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pinjamans');
    }
}
