<?php

use App\Models\DaftarDonasi;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('kode_donasi');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(DaftarDonasi::class);
            $table->string('snap_token');
            $table->integer('jumlah');
            $table->timestamp('waktu_donasi');
            $table->string('metode_pembayaran');
            $table->string('status');
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
        Schema::dropIfExists('donasis');
    }
};
