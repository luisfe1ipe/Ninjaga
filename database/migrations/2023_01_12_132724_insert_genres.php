<?php

use App\Models\Genre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Genre::create([
            'name' => 'Ação',
        ]);

        Genre::create([
            'name' => 'Aventura',
        ]);

        Genre::create([
            'name' => 'Shounen',
        ]);

        Genre::create([
            'name' => 'Romance',
        ]);

        Genre::create([
            'name' => 'Artes Marciais',
        ]);

        Genre::create([
            'name' => 'Suspense',
        ]);

        Genre::create([
            'name' => 'Fantasia',
        ]);

        Genre::create([
            'name' => 'Isekai',
        ]);

        Genre::create([
            'name' => 'Drama',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
