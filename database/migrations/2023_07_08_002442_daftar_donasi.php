<?php

use App\Models\Kategori;
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
        Schema::create('daftar_donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kategori::class);
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('excerpt');
            $table->integer('total_donasi')->default(0);
            $table->string('foto')->default('default.jpg');
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
        Schema::dropIfExists('daftar_donasis');
    }
};
