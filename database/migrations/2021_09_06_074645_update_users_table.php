<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->integer('phone')->nullable();
            $table->string('intro', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('username');
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('intro');
            $table->dropColumn('birthday');
            $table->dropColumn('deleted_at');
        });
    }
}
