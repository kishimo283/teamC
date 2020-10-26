<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => '演習',
            'start_date' => '2020-10-24',
            'start_time' => '18:00',
            'created_at' => '2020-10-26 12:38:17',
            'updated_at' => '2020-10-26 12:38:17'
        ]);
    }
}
