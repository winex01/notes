<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Winex',
                'email' => 'winnie131212592@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$J438lJKtFz5XddBUcee0HeSX3Cm3l.YliiriYtayqqWch5rUDaXiO',
                'remember_token' => 'nI2VZTPKoqFswHzSLmwuTP82PUEmMP328X6WKVB4FfT1OnQrNQq9KnuKlEnI',
                'created_at' => '2024-06-08 06:49:56',
                'updated_at' => '2024-06-08 06:49:56',
            ),
        ));
        
        
    }
}