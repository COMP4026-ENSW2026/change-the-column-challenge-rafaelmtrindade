<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTmpSizePets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allowedSizes = ['XS', 'SM', 'M', 'L', 'XL'];

        Schema::table('pets', function (Blueprint $table) use ($allowedSizes) {
            $table->enum('tmp_size', $allowedSizes)->default($allowedSizes[0]);
        });

        $sqlQuery  = "UPDATE pets SET tmp_size = CASE ";
        $sqlQuery .= "WHEN UPPER(size) IN ";
        $sqlQuery .= "('" . implode("', '", array_slice($allowedSizes, 1)) . "') ";
        $sqlQuery .= "THEN UPPER(size) ";
        $sqlQuery .= "WHEN UPPER(size) = 'SMALL' THEN 'SM' ";
        $sqlQuery .= "WHEN UPPER(size) = 'MEDIUM' THEN 'M' ";
        $sqlQuery .= "WHEN UPPER(size) = 'LARGE' THEN 'L' ";
        $sqlQuery .= "WHEN UPPER(size) = 'EXTRA LARGE' THEN 'XL' ";
        $sqlQuery .= "ELSE tmp_size END";

        DB::statement($sqlQuery);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn('tmp_size');
        });
    }
}
