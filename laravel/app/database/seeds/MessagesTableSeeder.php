<?php 

use App\Models\Message;

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('messages')->delete();

		Message::create(array(
			'id' 				=> 1,
			'messageable_type'  => 'message',
			'messageable_id'	=> 0,
			'from_id'			=> 2,
			'to_id'				=> 3,
			'subject'			=> 'Message 1',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
		Message::create(array(
			'id' 				=> 2,
			'messageable_type'  => 'offer',
			'messageable_id'	=> 2,
			'from_id'			=> 3,
			'to_id'				=> 2,
			'subject'			=> 'Message 2',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
		Message::create(array(
			'id' 				=> 3,
			'messageable_type'  => 'message',
			'messageable_id'	=> 0,
			'from_id'			=> 2,
			'to_id'				=> 3,
			'subject'			=> 'Offer 2',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
		Message::create(array(
			'id' 				=> 4,
			'messageable_type'  => 'transaction',
			'messageable_id'	=> 3,
			'from_id'			=> 2,
			'to_id'				=> 3,
			'subject'			=> 'Transaction 1',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
		Message::create(array(
			'id' 				=> 5,
			'messageable_type'  => 'transaction',
			'messageable_id'	=> 2,
			'from_id'			=> 3,
			'to_id'				=> 2,
			'subject'			=> 'Transaction 2',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
		Message::create(array(
			'id' 				=> 6,
			'messageable_type'  => 'bid',
			'messageable_id'	=> 1,
			'from_id'			=> 2,
			'to_id'				=> 3,
			'subject'			=> 'Bid 1',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
		Message::create(array(
			'id' 				=> 7,
			'messageable_type'  => 'bid',
			'messageable_id'	=> 2,
			'from_id'			=> 3,
			'to_id'				=> 2,
			'subject'			=> 'Bid 2',
			'body'				=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
			'created_at' 		=> Carbon\Carbon::now()->subWeek(),
			'updated_at' 		=> Carbon\Carbon::now()->subWeek(),
		));
	}

}