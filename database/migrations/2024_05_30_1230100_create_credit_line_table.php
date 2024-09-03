<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateCreditLineTable extends Migration
{
    public function up(): void
    {
        if (!Capsule::schema()->hasTable('credit_lines')) {
            Capsule::schema()->create('credit_lines', function (Blueprint $table) {
                $table->unsignedInteger('id')->primary()->autoIncrement();
                $table->unsignedInteger('customer_id');
                $table->unsignedInteger('line_no');
                $table->decimal('credit_amount', 10, 2)->default(0.00);
                $table->timestamp('validity');
                $table->tinyInteger('credit_status')->default(1);
                $table->unsignedInteger('warehouse_id');
                $table->timestamps();
                $table->timestamp('canceled_at')->nullable();
                $table->unsignedInteger('created_by');
                $table->unsignedInteger('updated_by')->nullable();
                $table->unsignedInteger('canceled_by')->nullable();

                // Definir las llaves foráneas (asegúrate de que las tablas referenciadas existen)
                // $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
                // $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('cascade')->onDelete('cascade');
                // $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
                // $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
                // $table->foreign('canceled_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Capsule::schema()->dropIfExists('credit_lines');
    }
}
