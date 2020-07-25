<?php

use App\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::Create([
            'name' => '0 - 6 Meses'
        ]);
        Experience::Create([
            'name' => '6 Meses - 1 Año'
        ]);
        Experience::Create([
            'name' => '1 Año - 3 Años'
        ]);
        Experience::Create([
            'name' => '3 Años - 5 Años'
        ]);
        Experience::Create([
            'name' => '5 Años - 7 Años'
        ]);
        Experience::Create([
            'name' => '7 Años - 10 Años'
        ]);
        Experience::Create([
            'name' => '10 Años - 12 Años'
        ]);
        Experience::Create([
            'name' => '12 Años - 15 Años'
        ]);
    }
}
