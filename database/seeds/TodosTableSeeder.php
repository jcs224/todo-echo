<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'text' => 'Set up Laravel project',
                'completed' => true
            ],
            [
                'text' => 'Get Laravel Echo Working',
                'completed' => false
            ],
            [
                'text' => 'Magic, Profit, Rainbows and Unicorns',
                'completed' => false
            ],
        ]);
    }
}
