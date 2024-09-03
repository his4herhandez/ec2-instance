<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateCreditLineAmountsTable extends Migration
{
    public function up(): void
    {
        if (!Capsule::schema()->hasTable('credit_line_amounts')) {
            Capsule::schema()->create('credit_line_amounts', function (Blueprint $table) {
                $table->unsignedInteger('id')->primary()->autoIncrement();
                $table->decimal('amount', 10, 2)->default(0.00);
            });
        }
    }

    public function down(): void
    {
        Capsule::schema()->dropIfExists('credit_line_amounts');
    }
}
