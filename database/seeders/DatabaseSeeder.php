<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        User::factory()->create_admin()->create();
        User::factory()->create_user()->create();
        User::factory()->create_guest()->create();

        // 2. Create Categories and Products
        // This creates 5 categories, and for each category, it creates 4 products
        Category::factory(5)->create()->each(function ($category) {
            Product::factory(4)->create([
                'category_id' => $category->id,
            ]);
        });

        // 3. Create Orders with Items
        // We grab a random user for each order
        $users = User::all();
        $products = Product::all();

        Order::factory(10)->create()->each(function ($order) use ($users, $products) {
            // Assign a random user and their email to the order to match your schema
            $randomUser = $users->random();
            $order->update([
                'user_id' => $randomUser->id,
                'email' => $randomUser->email,
            ]);

            // Create 2 to 5 items for this specific order
            OrderItem::factory(rand(2, 5))->create([
                'order_id' => $order->id,
                'product_id' => $products->random()->id,
            ]);
        });
    }
}
