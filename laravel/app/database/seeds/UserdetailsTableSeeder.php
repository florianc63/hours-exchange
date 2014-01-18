<?php

class UserdetailsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('user_details')->delete();
        
        UserDetail::create(array(
				'first_name'   => 'John',
				'last_name'    => 'Smith',
				'user_id'    => 1,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        UserDetail::create(array(
				'first_name'   => 'Gus',
				'last_name'    => 'Mun',
				'user_id'    => 2,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        UserDetail::create(array(
				'first_name'   => 'Traian',
				'last_name'    => 'Cazacu',
				'user_id'    => 3,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
	}

}
