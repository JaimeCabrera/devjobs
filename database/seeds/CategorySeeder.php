<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Front End'
        ]);
        Category::create([
            'name' => 'Back End'
        ]);
        Category::create([
            'name' => 'Full Stack'
        ]);
        Category::create([
            'name' => 'DevOps'
        ]);
        Category::create([
            'name' => 'DBA'
        ]);
        Category::create([
            'name' => 'UX / UI'
        ]);
        Category::create([
            'name' => 'TeachLead'
        ]);
    }
}
