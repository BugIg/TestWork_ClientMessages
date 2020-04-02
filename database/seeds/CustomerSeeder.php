<?php
declare(strict_types = 1);

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create 10000 records of messages
        factory(App\Customer::class, 10000)->create();
    }
}
