<?php 

use App\Models\Bid;

class BidsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('bids')->delete();

		Bid::create(array(
				'id' 			=> 1,
				'request_id' 	=> 3,
				'buyer_id' 		=> 3,
				'seller_id' 	=> 2,
				'value' 		=> 2,
				'created_at' 	=> Carbon\Carbon::now()->subWeek(),
				'updated_at' 	=> Carbon\Carbon::now()->subWeek(),
		));
		Bid::create(array(
				'id' 			=> 2,
				'request_id' 	=> 2,
				'buyer_id' 		=> 2,
				'seller_id' 	=> 3,
				'value' 		=> 4,
				'created_at' 	=> Carbon\Carbon::now()->subWeek(),
				'updated_at' 	=> Carbon\Carbon::now()->subWeek(),
		));
		Bid::create(array(
				'id' 			=> 3,
				'request_id' 	=> 1,
				'buyer_id' 		=> 2,
				'seller_id' 	=> 3,
				'value' 		=> 3,
				'created_at' 	=> Carbon\Carbon::now()->subWeek(),
				'updated_at' 	=> Carbon\Carbon::now()->subWeek(),
		));
	}
}