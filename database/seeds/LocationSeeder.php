<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::Create([
            'name' => 'Estados Unidos'
        ]);
        Location::Create([
            'name' => 'Mexico'
        ]);
        Location::Create([
            'name' => 'Ecuador'
        ]);
        Location::Create([
            'name' => 'Colombia'
        ]);
        Location::Create([
            'name' => 'Chile'
        ]);
        Location::Create([
            'name' => 'Peru'
        ]);
    }
}
