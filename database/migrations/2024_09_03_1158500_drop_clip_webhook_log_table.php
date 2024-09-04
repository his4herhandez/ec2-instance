<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class DropClipWebhookLogTable extends Migration
{
    public function up()
    {
        Capsule::schema()->dropIfExists('clip_webhook_log');
    }

    public function down()
    {
        Capsule::schema()->create('clip_webhook_log', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary()->autoIncrement();
            $table->string('clip_id', 60);
            $table->string('payment_request_id', 60);
            $table->string('resource', 30)->nullable();
            $table->string('resource_status', 30)->nullable();
            $table->tinyInteger('attempts')->nullable();
            $table->text('response');
            $table->timestamp('created_at');
        });
    }
}