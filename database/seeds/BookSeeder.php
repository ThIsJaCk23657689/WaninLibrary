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
        $books = factory(BookEloquent::class, 100000)->create();
        $books = factory(BookEloquent::class, 100000)->create();
        $books = factory(BookEloquent::class, 100000)->create();
        $books = factory(BookEloquent::class, 100000)->create();
    }
}
