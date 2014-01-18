<?php

class SkillsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('skills')->delete();
        
        Skill::create(array(
				'name'   => 'Cashier',
				'slug'    => 'cashier',
				'category_id'    => 1,
				'user_id'    => 1,
				'place'    => 1,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Skill::create(array(
				'name'   => 'Waitress',
				'slug'    => 'waitress',
				'category_id'    => 1,
				'user_id'    => 1,
				'place'    => 2,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Skill::create(array(
				'name'   => 'Waiter',
				'slug'    => 'waiter',
				'category_id'    => 1,
				'user_id'    => 1,
				'place'    => 3,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Skill::create(array(
				'name'   => 'Bartender',
				'slug'    => 'bartender',
				'category_id'    => 1,
				'user_id'    => 1,
				'place'    => 4,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Skill::create(array(
				'name'   => 'Public relations',
				'slug'    => 'public-relations',
				'category_id'    => 2,
				'user_id'    => 1,
				'place'    => 5,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Skill::create(array(
				'name'   => 'Keeping records',
				'slug'    => 'keeping-records',
				'category_id'    => 2,
				'user_id'    => 1,
				'place'    => 6,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
	}

}
