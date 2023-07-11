<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Transaction::insert([
			'users_id' => 1,
			'name' => 'Naedy',
			'email' => 'dickykhusnaedy@gmail.com',
			'address' => 'Perumahan Bida Ayu',
			'phone' => '+6287882292558',
			'courier' => 'JNE Express',
			'payment' => 'MIDTRANS',
			'payment_url' => '',
			'total_price' => 450000
		]);
	}
}
