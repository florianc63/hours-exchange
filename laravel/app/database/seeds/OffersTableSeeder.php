<?php

use App\Models\Offer;

class OffersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('offers')->delete();
		
		Offer::create(array(
            'user_id' => 2,
            'service_id' => 8,
            'title'   => 'First job offer',
            'slug'    => 'first-job-offer',
            'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 3,
            'date_expire' => Carbon\Carbon::now()->addMonth(),
            'qty' => 5,
            'remaining' => 5,
            'location' => 'Vancouver',
            'visible' => 'yes',
			'created_at' => Carbon\Carbon::now()->subWeek(),
			'updated_at' => Carbon\Carbon::now()->subWeek(),				
        ));     
        Offer::create(array(
            'user_id' => 2,
            'service_id' => 7,
            'title'   => 'Second job offer',
            'slug'    => 'second-job-offer',
            'body'    => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 1.5,
            'date_expire' => Carbon\Carbon::now()->addDays(14),
            'qty' => 12,
            'remaining' => 8,
            'location' => 'North Vancouver',
            'visible' => 'yes',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),				
        ));     
        Offer::create(array(
            'user_id' => 3,
            'service_id' => 11,
            'title'   => 'Third job',
            'slug'    => 'third-job',
            'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 2.5,
            'date_expire' => Carbon\Carbon::now()->subDays(3),
            'qty' => 10,
            'remaining' => 9,
            'location' => 'California',
            'visible' => 'yes',
			'created_at' => Carbon\Carbon::now()->subMonth(),
			'updated_at' => Carbon\Carbon::now()->subMonth(),				
        ));     
	}

}
