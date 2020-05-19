<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnInNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->longText('content_origin')->nullable()->change();
            $table->string('link', 255)->nullable()->change();
            $table->string('md5_link', 255)->nullable()->change();
            $table->integer('type')->default(0)->comment('0:clone, 1:tự thêm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
