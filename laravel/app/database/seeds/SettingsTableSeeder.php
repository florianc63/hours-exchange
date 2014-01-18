<?php

class SettingsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('settings')->delete();
        
		DB::table('settings')->insert(array(
			array('key' => 'site_title', 'value' => 'Hour Exchange'),
			array('key' => 'homepage', 'value' => '4'),
		));
		
	}

}
