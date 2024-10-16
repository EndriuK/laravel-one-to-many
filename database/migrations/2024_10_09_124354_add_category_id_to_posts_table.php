<?php

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
        Schema::table('posts', function (Blueprint $table) {

            // Creo pirma la colonna
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // Aggiungo la foreign key
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {


            $table->dropForeign('posts_category_id_foreign');

            $table->dropColumn('category_id');
        });
    }
};
