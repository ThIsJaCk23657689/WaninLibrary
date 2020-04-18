<?php

use Illuminate\Database\Seeder;
use App\User as UserEloquent;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = UserEloquent::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('00000000'),
        ]);
        $user->save();
        
        
        $user = UserEloquent::create([
            'name' => 'Jack',
            'email' => 'y23657689@gmail.com',
            'password' => bcrypt('jack0619'),
        ]);
        $user->save();
        
        $users = factory(UserEloquent::class, 8)->create();
    }
}
