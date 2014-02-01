<?php

use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function($table) {

			$table->increments('id');
			$table->string('entity_type');
			$table->integer('entity_id');
			$table->integer('from_id');
			$table->integer('to_id');
			$table->string('subject');
			$table->string('body');
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
		Schema::drop('messages');
	}

}