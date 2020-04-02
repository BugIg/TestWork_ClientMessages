<?php
declare(strict_types = 1);

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create 100 records of messages
        factory(App\Message::class, 5)->create()->each(static function (App\Message $message) {
            // Seed the relation with 2 schedules

            try {
                $amount = random_int(1, 2);
                $schedules = factory(App\Schedule::class, $amount)->make();
                $message->schedules()->saveMany($schedules);
            } catch (\Illuminate\Database\QueryException $e) {

            }

        });
    }
}
