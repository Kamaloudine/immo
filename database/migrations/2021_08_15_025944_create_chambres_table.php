<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('quartier_id');
            //$table->unsignedInteger('images_id');
            $table->string('caracteristique');
            $table->enum('status',['libre','en cours','occupee'])->default('libre');
            $table->enum('etat',['0','1'])->default('0');
            $table->timestamps();

            // foreign keys to users
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
             // foreign keys to types chambres
             $table->foreign('type_id')
                    ->references('id')
                    ->on('type_chambres')
                    ->onDelete('cascade');         
            // foreign keys to quartiers
            $table->foreign('quartier_id')
                    ->references('id')
                    ->on('quartiers')
                    ->onDelete('cascade');
            //  foreign keys to images
            /*$table->foreign('user_id')
                    ->references('id')
                    ->on('images_id')
                    ->onDelete('cascade');*/
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chambres');
    }
}
