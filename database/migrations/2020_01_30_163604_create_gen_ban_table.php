<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenBanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_ban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip');
            $table->tinyInteger('ban_ignore')->default(0)->comment('Признак игнорирования бана');
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
        Schema::dropIfExists('gen_ban');
    }
}
