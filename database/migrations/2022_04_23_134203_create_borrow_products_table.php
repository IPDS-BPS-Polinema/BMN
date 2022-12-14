<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman');
            $table->double('jumlah')->nullable()->default(NULL);
            $table->text('deskripsi')->nullable()->default(NULL);
            $table->string('nama_peminjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->date('tanggal_pengembalian')->nullable()->default(NULL);
            $table->string('status')->nullable()->default(NULL);
            $table->string('kondisi_setelahdipinjam')->nullable()->default(NULL);
            $table->text('catatan')->nullable()->default(NULL);
            $table->timestamps();
            $table->unsignedBigInteger('petugas');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_merk');
            $table->foreign('petugas')->references('id')->on('users');
            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_merk')->references('id')->on('merk_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_products');
    }
}
