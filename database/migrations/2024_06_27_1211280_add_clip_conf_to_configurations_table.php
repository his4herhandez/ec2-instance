<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class AddCommitIdColumnToMigrations extends Migration
{
    public function up()
    {
        Capsule::schema()->table('migrations', function (Blueprint $table) {
            $table->string('commit_id', 60)->nullable()->after('migration_name');
        });
    }

    public function down()
    {
        Capsule::schema()->table('migrations', function (Blueprint $table) {
            $table->dropColumn('commit_id');
        });
    }
}