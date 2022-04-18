<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTmpSpeciesToPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allowedSpecies = ['outro', 'cachorro', 'gato', 'papagaio', 'periquito', 'calopsita', 'lagarto', 'peixe', 'cobra', 'tartaruga', 'rato', 'hamster', 'coelho', 'cavalo'];

        Schema::table('pets', function (Blueprint $table) use ($allowedSpecies) {
            $table->enum('species', $allowedSpecies)->default($allowedSpecies[0]);
        });

        $sqlQuery  = "UPDATE pets SET species = CASE ";
        $sqlQuery .= "WHEN LOWER(specie) IN ";
        $sqlQuery .= "('" . implode("', '", array_slice($allowedSpecies, 1)) . "') ";
        $sqlQuery .= "THEN LOWER(specie) ";
        $sqlQuery .= "WHEN LOWER(specie) = 'dog' THEN 'cachorro' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'cockatiel' THEN 'calopsita' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'horse' THEN 'cavalo' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'snake' THEN 'cobra' ";
        $sqlQuery .= "WHEN LOWER(specie) IN ('bunny', 'rabbit') THEN 'coelho' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'cat' THEN 'gato' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'lizard' THEN 'lagarto' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'parrot' THEN 'papagaio' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'fish' THEN 'peixe' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'parakeet' THEN 'periquito' ";
        $sqlQuery .= "WHEN LOWER(specie) IN ('rat', 'mouse') THEN 'rato' ";
        $sqlQuery .= "WHEN LOWER(specie) = 'turtle' THEN 'tartaruga' ";
        $sqlQuery .= "ELSE species END";

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
            $table->dropColumn('species');
        });
    }
}
