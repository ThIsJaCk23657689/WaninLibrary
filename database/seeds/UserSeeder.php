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
            'account' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('00000000'),
            'status' => 0,
        ]);
        $user->save();


        $user = UserEloquent::create([
            'name' => 'Jack',
            'account'=>'y23657689',
            'email' => 'y23657689@gmail.com',
            'password' => bcrypt('jack0619'),
            'status' => 0,
        ]);
        $user->save();

        $user = UserEloquent::create([
            'name' => 'Jamie',
            'account'=>'jamie870116',
            'email' => 'jamie870116@gmail.com',
            'password' => bcrypt('jj12345678'),
            'status' => 0,
        ]);
        $user->save();

        $users = factory(UserEloquent::class, 8)->create();
    }
}
