<?php
/*id	
	2	user_id	
	3	service_id
	4	title
	5	slug
	6	body
	7	price
	8	date_expire
	9	location
	10	image 
	11	visible
	12	created_at
	13	updated_at */
use App\Models\Request;

class RequestsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('requests')->delete();
		
		HxRequest::create(array(
            'user_id' => 1,
            'service_id' => 8,
            'title'   => 'First job request',
            'slug'    => 'first-job-request',
            'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 3,
            'date_expire' => Carbon\Carbon::now()->addMonth(),
            'location' => 'Vancouver',
            'visible' => 'yes',
			'created_at' => Carbon\Carbon::now()->subWeek(),
			'updated_at' => Carbon\Carbon::now()->subWeek(),				
        ));     
        HxRequest::create(array(
            'user_id' => 2,
            'service_id' => 7,
            'title'   => 'Second job request',
            'slug'    => 'second-job-request',
            'body'    => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 1.5,
            'date_expire' => Carbon\Carbon::now()->addDays(14),
            'location' => 'North Vancouver',
            'visible' => 'yes',
			'created_at' => Carbon\Carbon::now(),
			'updated_at' => Carbon\Carbon::now(),				
        ));     
        HxRequest::create(array(
            'user_id' => 3,
            'service_id' => 11,
            'title'   => 'Third job',
            'slug'    => 'third-job',
            'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'price' => 2.5,
            'date_expire' => Carbon\Carbon::now()->subDays(3),
            'location' => 'California',
            'visible' => 'yes',
			'created_at' => Carbon\Carbon::now()->subMonth(),
			'updated_at' => Carbon\Carbon::now()->subMonth(),				
        ));     
	}

}
