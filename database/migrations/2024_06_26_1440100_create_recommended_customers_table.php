<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateRecommendedCustomersTable extends Migration
{
    public function up(): void
    {
        if (!Capsule::schema()->hasTable('recommended_customers')) {
            Capsule::schema()->create('recommended_customers', function (Blueprint $table) {
                $table->unsignedInteger('id')->primary()->autoIncrement();
                $table->unsignedInteger('customer_id');
                $table->unsignedInteger('recommended_customer_id');
                $table->tinyInteger('recommended_no');
                $table->tinyInteger('discount_percent');
                $table->tinyInteger('has_timely_pay_discount')->default(1);
                $table->tinyInteger('active_customer')->default(0);
                $table->unsignedInteger('financed_sale_id');
            });
        }
    }

    public function down(): void
    {
        Capsule::schema()->dropIfExists('recommended_customers');
    }
}
