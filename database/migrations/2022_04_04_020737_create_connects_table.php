<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connects', function (Blueprint $table) {
            $table->id();
            $table->string('name');             //他サーバー名
            $table->string('serial');           //サーバーのシリアル
            $table->string('url')->unique();   //相手のURL
            $table->string('token');            //承認後のアクセス用token
            $table->integer('approval');        //承認状態 0:承認待ち 1:承認 2:拒否 4:申請中
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
        Schema::dropIfExists('connects');
    }
}
