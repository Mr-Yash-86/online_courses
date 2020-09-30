<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['IT and Software', 'Marketing', 'Business', 'Photography' , 'Development', 'Design', 'Music', 'Personal Development'];

        foreach ($categories as $row) {
        Category::create(['name' => $row]);
    }

  }
}
