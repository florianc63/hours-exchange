<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SentryTableSeeder');
		$this->command->info('Sentry tables seeded!');
		
		$this->call('OffersTableSeeder');
		$this->command->info('Offers table seeded!');	
		
		$this->call('RequestsTableSeeder');
		$this->command->info('Requests table seeded!');
		
		$this->call('PagesTableSeeder');
		$this->command->info('Pages table seeded!');
		
		$this->call('SkillsCategoriesTableSeeder');
		$this->command->info('SkillsCategories table seeded!');

		$this->call('SkillsTableSeeder');
		$this->command->info('Skills table seeded!');

		$this->call('UserdetailsTableSeeder');
		$this->command->info('UserDetails table seeded!');
		
		$this->call('ServicesTableSeeder');
		$this->command->info('Services table seeded!');
		
		$this->call('ServiceuserTableSeeder');
		$this->command->info('User Services table seeded!');

		$this->call('MessagesTableSeeder');
		$this->command->info('Messages table seeded!');

		$this->call('BidsTableSeeder');
		$this->command->info('Bids table seeded!');

		$this->call('TransactionsTableSeeder');
		$this->command->info('Transactions table seeded!');

		$this->call('SettingsTableSeeder');
		$this->command->info('Settings table seeded!');

	}

}