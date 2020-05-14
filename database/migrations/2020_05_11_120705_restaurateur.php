<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Restaurateur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('restaurateur', function (Blueprint $table) {
            $table->id();

            $table->text('nom_restaurant');
            $table->text('logo');
            $table->text('adresse_mail_contact');
            $table->text('adresse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('restaurateur');
    }
}
