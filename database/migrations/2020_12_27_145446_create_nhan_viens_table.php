<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->increments("Id_Nv");
            $table->string("Ten_Nv");
            $table->integer("Tuoi");
            $table->boolean("Gioi_Tinh");
            $table->integer("SDT");
            $table->integer("Ca_lam_viec");
            $table->integer("Luong");
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
        Schema::dropIfExists('nhan_viens');
    }
}
