<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $levels = ['Beginner', 'Intermediate', 'Expert'];

        foreach ($levels as $row) {
        Level::create(['name' => $row]);
    }

  }
}
