<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReplaceSpecieSpeciesPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn('specie');
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->renameColumn('species', 'specie');
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
            $table->renameColumn('specie', 'species');
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->string('specie');
        });
    }
}
