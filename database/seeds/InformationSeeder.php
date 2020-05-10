<?php

use Illuminate\Database\Seeder;
use App\Information as InformationEloquent;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $information = factory(InformationEloquent::class, 1)->create();
    }
}
