<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');			
			$table->integer('service_id');
            $table->string('title');
            $table->string('slug');
            $table->text('body')->nullable();            
            $table->float('price');
			$table->dateTime('date_expire');
            $table->integer('qty');		
            $table->string('location');
            $table->string('image')->nullable();            
			$table->string('visible', 3);			
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
		Schema::drop('offers');
	}

}
