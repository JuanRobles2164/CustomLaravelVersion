<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->references('id')->on('users');
            $table->string('obligatorio');
            $table->string('opcional')->nullable();
            $table->longText('texto_largo');
            $table->date('fecha_date');
            $table->boolean('booleano');
            $table->ipAddress('direccion_ip');
            $table->float('flotante', 8, 2);
            $table->enum('enumerado', ['easy', 'hard']);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase');
    }
}
