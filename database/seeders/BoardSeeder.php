<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { // Loop untuk membuat 10 record
            Board::create([
                'name' => fake()->name(),
                'answer' => fake()->name(),
            ]);
        }
    }
}
