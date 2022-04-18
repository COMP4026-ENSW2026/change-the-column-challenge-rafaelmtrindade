<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;

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
        $tmpAllowedSizes = ['EXTRA SMALL', 'SMALL', 'MEDIUM', 'LARGE', 'EXTRA LARGE'];

        Schema::table('pets', function (Blueprint $table) use ($allowedSizes) {
            $table->enum('tmp_size', $allowedSizes)->default('SM');
        });

        $allPets = Pet::all(['id', 'size']);
        foreach ($allPets as $pet) {
            $fSize = strtoupper(trim($pet->size));

            $i = array_search($fSize, $allowedSizes);
            if ($i === false)
                $i = array_search($fSize, $tmpAllowedSizes);

            if ($i === false) continue;

            DB::statement("UPDATE pets SET tmp_size = '$allowedSizes[$i]' WHERE id = $pet->id");
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
            $table->dropColumn('tmp_size');
        });
    }
}
