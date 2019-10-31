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
        $dados = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => \Hash::make('123456'),
                'tipo_user_id' => '1'
             ],[
                'name' => 'Funcionario',
                'email' => 'funcionario@email.com',
                'password' => \Hash::make('123456'),
                'tipo_user_id' => '2'
             ],[
                'name' => 'Cliente',
                'email' => 'Cliente@email.com',
                'password' => \Hash::make('123456'),
                'tipo_user_id' => '3'
            ]
         ];
 
         DB::table('users')->insert($dados);
    }
}
