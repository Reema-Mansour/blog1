<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
          'name' => 'Reema Mansour',
          'email' => 'lamar10010088@gmail.com',
          'password' => bcrypt('la100100')
        ]);
    }
}
