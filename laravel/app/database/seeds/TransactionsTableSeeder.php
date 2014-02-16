<?php 

use App\Models\Transaction;

class TransactionsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('transactions')->delete();

		Transaction::create(array(
						'id' => 1,
						'transactionable_type' => 'offer',
						'transactionable_id' => 2,
						'buyer_id' => 3,
						'seller_id' => 2,
						'value' => 6,
						'created_at' => Carbon\Carbon::now()->subWeek(),
						'updated_at' => Carbon\Carbon::now()->subWeek(),
		));
		Transaction::create(array(
						'id' => 2,
						'transactionable_type' => 'offer',
						'transactionable_id' => 2,
						'buyer_id' => 2,
						'seller_id' => 3,
						'value' => 2,
						'created_at' => Carbon\Carbon::now()->subWeek(),
						'updated_at' => Carbon\Carbon::now()->subWeek(),
		));
		Transaction::create(array(
						'id' => 3,
						'transactionable_type' => 'request',
						'transactionable_id' => 2,
						'buyer_id' => 2,
						'seller_id' => 3,
						'value' => 1.5,
						'created_at' => Carbon\Carbon::now()->subWeek(),
						'updated_at' => Carbon\Carbon::now()->subWeek(),
		));
		Transaction::create(array(
						'id' => 4,
						'transactionable_type' => 'request',
						'transactionable_id' => 2,
						'buyer_id' => 3,
						'seller_id' => 2,
						'value' => 3,
						'created_at' => Carbon\Carbon::now()->subWeek(),
						'updated_at' => Carbon\Carbon::now()->subWeek(),
		));
	}
}