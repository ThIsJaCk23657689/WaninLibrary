<?php

use Illuminate\Database\Seeder;
use App\Borrower as BorrowerEloquent;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $borrowers = factory(BorrowerEloquent::class, 100)->create();
    }
}
