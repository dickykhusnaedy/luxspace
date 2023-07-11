<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Product::insert([
			'name' => 'Tumblr Tee / T-Shirt / Kaos Pria Lengan Pendek New York - Hitam',
			'price' => 43900,
			'description' => '<p>Lorem ipsum dolor sit amet. Eos nobis consequatur nam consequatur ipsam est doloremque deserunt ut quod quas et ratione quasi cum facilis corporis. Sit dolorem dolorem est minus inventore qui pariatur nisi. Hic placeat rerum qui exercitationem ullam id cumque minus. Qui consequatur ducimus aut beatae animi et totam minus vel nemo soluta.</p><p>Est nobis fugit vel voluptatum sapiente et numquam reprehenderit ut quisquam voluptates id exercitationem consequatur aut quaerat odio quo reiciendis error. Eos alias consequatur aut dolores dolores est quos ratione non soluta cupiditate ut veritatis sequi qui suscipit exercitationem id voluptates excepturi.</p><p>Eos dolor iure aut molestias officiis ut vitae Quis ut aliquid veniam ex laborum laboriosam qui dolor voluptas ex enim labore! Sit omnis ipsa qui recusandae voluptas sed sapiente veritatis aut obcaecati obcaecati aut officia incidunt sed eaque enim et accusamus dolore.</p>',
			'slug' => 'tumblr-tee-t-shirt-kaos-pria-lengan-pendek-new-york-hitam'
		]);
	}
}
