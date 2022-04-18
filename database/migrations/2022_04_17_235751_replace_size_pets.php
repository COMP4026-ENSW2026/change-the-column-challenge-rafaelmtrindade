<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReplaceSizePets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn('size');
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->renameColumn('tmp_size', 'size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->renameColumn('size', 'tmp_size');
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->string('size');
        });
    }
}
