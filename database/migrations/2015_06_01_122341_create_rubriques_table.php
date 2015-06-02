<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubriquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rubriques', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('titre');
            $table->string('slug');
            $table->text('texte');
            $table->integer('tri');
            $table->boolean('galerie');
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
		Schema::drop('rubriques');
	}

}
