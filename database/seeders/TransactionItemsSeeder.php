<?php

namespace Database\Seeders;

use App\Models\TransactionItem;
use Illuminate\Database\Seeder;

class TransactionItemsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		TransactionItem::insert([
			'users_id' => 1,
			'transactions_id' => 1,
			'products_id' => 1
		]);
	}
}
