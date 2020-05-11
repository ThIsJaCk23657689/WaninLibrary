<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AgencySeeder::class);
        $this->call(DonorSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(BorrowerSeeder::class);
        $this->call(InformationSeeder::class);
    }
}
