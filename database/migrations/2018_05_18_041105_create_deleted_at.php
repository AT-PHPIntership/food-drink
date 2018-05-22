<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('user_infos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('posts', function (Blueprint $table) {
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
            $table->dropColumn('deleted_at');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('user_infos', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
