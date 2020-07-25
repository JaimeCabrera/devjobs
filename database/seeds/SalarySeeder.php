<?php

use App\Salary;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salary::create([
            'name' => ' 0 a 1000 USD'
        ]);
        Salary::create([
            'name' => ' 1000 a 2000 USD'
        ]);
        Salary::create([
            'name' => '2000 a 4000 USD'
        ]);
        Salary::create([
            'name' => ' 4000 a 5000 USD'
        ]);
        Salary::create([
            'name' => ' No mostrar'
        ]);
    }
}
