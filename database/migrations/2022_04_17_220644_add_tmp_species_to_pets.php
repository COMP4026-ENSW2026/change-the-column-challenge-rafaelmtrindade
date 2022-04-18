<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;

class AddTmpSpeciesToPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allowedSpeciesPt = ['cachorro', 'gato', 'papagaio', 'periquito', 'calopsita', 'lagarto', 'peixe', 'cobra', 'tartaruga', 'rato', 'hamster', 'coelho', 'cavalo', 'outro'];
        $allowedSpeciesEn = ['dog', 'cat', 'parrot', 'parakeet', 'cockatiel', 'lizard', 'fish', 'snake', 'turtle', 'rat', 'hamster', 'bunny', 'horse'];

        Schema::table('pets', function (Blueprint $table) use ($allowedSpeciesPt) {
            $table->enum('species', $allowedSpeciesPt)->default('outro');
        });

        $allPets = Pet::all(['id', 'specie']);
        foreach ($allPets as $pet) {
            $fSpecie = strtolower($pet->specie);

            $i = array_search($fSpecie, $allowedSpeciesPt);
            if ($i === false)
                $i = array_search($fSpecie, $allowedSpeciesEn);

            if ($i === false) continue;

            DB::statement("UPDATE pets SET species = '$allowedSpeciesPt[$i]' WHERE id = $pet->id");
        }
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
