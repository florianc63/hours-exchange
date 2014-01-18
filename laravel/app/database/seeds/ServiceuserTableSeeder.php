<?php

class ServiceuserTableSeeder extends Seeder {

	public function run()
	{
        DB::table('service_user')->delete();
        
		DB::table('service_user')->insert(array(
			array('user_id' => '1', 'service_id' => 1),
			array('user_id' => '1', 'service_id' => 2),
			array('user_id' => '2', 'service_id' => 3),
			array('user_id' => '2', 'service_id' => 4),
			array('user_id' => '3', 'service_id' => 5),
			array('user_id' => '3', 'service_id' => 6)
		));
		
	}

}
