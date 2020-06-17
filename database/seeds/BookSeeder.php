<?php

use Illuminate\Database\Seeder;
use App\Book as BookEloquent;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i = 0; $i < 100; $i++){
        //     $books = factory(BookEloquent::class, 1000)->create();
        // }
        for ($i=0; $i < 20; $i++) {
            $books = factory(BookEloquent::class, 2)->create();
        }

    }
}
