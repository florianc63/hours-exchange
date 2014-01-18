<?php

use App\Models\SkillsCategory;

class ServicesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('services')->delete();
        
        Service::create(array(
				'name'   => 'Arts & Crafts',
				'slug'    => '',
				'place'    => 1,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Building Services',
				'slug'    => '',
				'place'    => 2,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Business & Administration',
				'slug'    => '',
				'place'    => 3,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Children & Childcare',
				'slug'    => '',
				'place'    => 4,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Computers',
				'slug'    => '',
				'place'    => 5,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Counseling & Therapy',
				'slug'    => '',
				'place'    => 6,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Education',
				'slug'    => '',
				'place'    => 7,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Food',
				'slug'    => '',
				'place'    => 8,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Gardening & Yard Work',
				'slug'    => '',
				'place'    => 9,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Goods',
				'slug'    => '',
				'place'    => 10,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Health & Personal',
				'slug'    => '',
				'place'    => 11,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Household',
				'slug'    => '',
				'place'    => 12,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Miscellaneous',
				'slug'    => '',
				'place'    => 13,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Music & Entertainment',
				'slug'    => '',
				'place'    => 14,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Pets',
				'slug'    => '',
				'place'    => 15,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Sports & Recreation',
				'slug'    => '',
				'place'    => 16,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Teaching',
				'slug'    => '',
				'place'    => 17,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        Service::create(array(
				'name'   => 'Transportation',
				'slug'    => '',
				'place'    => 18,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
		
	}

}
