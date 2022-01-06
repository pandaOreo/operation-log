<?php
/**
 * @Author       : Jinghua Fan
 * @Date         : 2022-01-06 10:03:48
 * @LastEditors  : Jinghua Fan
 * @LastEditTime : 2022-01-06 10:05:18
 * @Description  : 佛祖保佑,永无BUG
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationLogTable extends Migration
{

    public function getConnection()
    {
        return config('database.connection') ? : config('database.default');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('admin_operation_log') ) {
            Schema::create('admin_operation_log', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->bigInteger('user_id');
                $table->string('path');
                $table->string('method', 10);
                $table->string('ip');
                $table->text('input');
                $table->index('user_id');
                $table->timestamps();
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
        Schema::dropIfExists('admin_operation_log');
    }
}
