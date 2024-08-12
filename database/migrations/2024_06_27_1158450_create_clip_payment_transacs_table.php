<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateClipPaymentTransacsTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('clip_payment_transacs', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary()->autoIncrement();
            $table->string('clip_id', 60);
            $table->unsignedInteger('financed_sale_id');
            $table->decimal('amount', 10, 2);
            $table->string('transac_status', 30)->nullable();
            $table->string('description', 50)->nullable();
            $table->string('payment_request_url', 120)->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->text('payment_data')->nullable();
            $table->timestamps();

            // Definir las llaves foráneas (asegúrate de que las tablas referenciadas existen)
            // $table->foreign('financed_sale_id')->references('id')->on('financed_saled')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('clip_payment_transacs');
    }
}