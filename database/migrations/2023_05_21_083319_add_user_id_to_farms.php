<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToFarms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('farms', 'user_id')) {
            Schema::table('farms', function (Blueprint $table) {
                $table->bigInteger('user_id')->unsigned()->after('way');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('farms', 'user_id')) {
            Schema::table('farms', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        }
    }
}


