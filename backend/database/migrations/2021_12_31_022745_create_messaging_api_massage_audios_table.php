<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagingApiMassageAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaging_api_massage_audios', function (Blueprint $table) {
            $table->unsignedBigInteger('messageId');
            $table->foreign('messageId')
                ->references('id')
                ->on('messaging_api_massages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer("duration");
            $table->string('type');
            $table->string('originalContentUrl');
            $table->string('previewImageUrl');

            // アプリケーション上の配置
            $table->string('fileName');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaging_api_massage_audios');
    }
}
