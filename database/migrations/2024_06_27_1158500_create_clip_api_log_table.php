<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateClipApiLogTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('clip_api_log', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary()->autoIncrement();
            $table->string('endpoint', 300);
            $table->string('headers', 1000);
            $table->text('calltrace')->nullable();
            $table->string('called_method', 100);
            $table->date('called_date');
            $table->time('called_time');
            $table->timestamp('responded_at')->nullable();
            $table->text('data_sent')->nullable();
            $table->text('response')->nullable();
            $table->unsignedInteger('clip_payment_transac_id')->nullable();

            $table->foreign('clip_payment_transac_id')->references('id')->on('clip_payment_transacs')->onUpdate('cascade')->onDelete('restrict');
            $table->index('clip_payment_transac_id');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('clip_api_log');
    }
}