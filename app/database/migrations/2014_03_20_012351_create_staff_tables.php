<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the addresses table
		Schema::create('addresses', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->boolean('primary');
			$table->string('name');
			$table->string('address_1');
			$table->string('address_2');
			$table->string('city');
			$table->string('state_province');
			$table->string('country');
			$table->string('postalcode', 10);
			$table->softDeletes();
			$table->timestamps();
		});

		// Create the profiles table
		Schema::create('profiles', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('position');
			$table->string('email');
			$table->dateTime('dob');
			$table->string('twitter');
			$table->string('facebook');
			$table->string('googleplus');
			$table->softDeletes();
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
		// Drop the addresses table
		Schema::dropIfExists('addresses');

		// Drop the profiles table
		Schema::dropIfExists('profiles');
	}

}
