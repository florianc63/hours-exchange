<?php

use App\Models\SkillsCategory;

class SkillsCategoriesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('skills_categories')->delete();
        
        SkillsCategory::create(array(
				'name'   => 'Restaurant',
				'slug'    => 'restaurant',
				'place'    => 1,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        SkillsCategory::create(array(
				'name'   => 'Sales',
				'slug'    => 'sales',
				'place'    => 2,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
        SkillsCategory::create(array(
				'name'   => 'Construction',
				'slug'    => 'construction',
				'place'    => 3,
				'created_at' => Carbon\Carbon::now(),
				'updated_at' => Carbon\Carbon::now(),				
		));
	}

}
