<?php

use Illuminate\Database\Seeder;

class TipoUserSeeder extends Seeder
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
                 'tipo_user' => 'Admin'
             ],[
                 'tipo_user' => 'Funcionario'
             ],[
                'tipo_user' => 'Cliente'
            ]
         ];
 
         DB::table('tipo_users')->insert($dados);
    }
}
