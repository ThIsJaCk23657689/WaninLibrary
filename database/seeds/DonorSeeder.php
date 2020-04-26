<?php

use Illuminate\Database\Seeder;
use App\Donor as DonorEloquent;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonorEloquent::create([
            'name' => '善心人士',
            'exposure' => 1,
            'content' => '這是給完全匿名的捐贈人使用。'
        ]);
        $donors = factory(DonorEloquent::class, 20)->create();
    }
}
