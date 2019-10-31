<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->create([
            'email' => 'admin@email.com',
            'password' => \Hash::make('123456')
        ]);
    }
}
