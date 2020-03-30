<?php

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
        factory(\App\User::class, 1)->create([
        'name'  => 'admin',
        'email' => 'admin@aqbusiness.id',
        'password'  => bcrypt('admin')
		]);
    }
}
