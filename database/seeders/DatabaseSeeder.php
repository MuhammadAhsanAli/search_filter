<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 50 customers, each with 5-10 orders, and each order with 1-5 items
        Customer::factory()
            ->count(50)
            ->create()
            ->each(function (Customer $customer) {
                Order::factory()
                    ->count(rand(5, 10))
                    ->create(['customer_id' => $customer->id])
                    ->each(function (Order $order) {
                        Item::factory()
                            ->count(rand(1, 5))
                            ->create(['order_id' => $order->id]);
                    });
            });
    }
}
