<?php

use Illuminate\Database\Seeder;
use App\Agency as AgencyEloquent;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agencies = factory(AgencyEloquent::class, 10)->create();
    }
}
