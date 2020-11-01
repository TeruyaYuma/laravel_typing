<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToDrills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drills', function (Blueprint $table) {
            DB::statement('DELETE FROM drills');
            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drills', function (Blueprint $table) {
            // 外部キー付きのカラムを削除するにはまず必ず外部キー制約を外す必要があります
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
