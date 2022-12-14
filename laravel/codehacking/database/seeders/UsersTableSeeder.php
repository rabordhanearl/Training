<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>Str::random(10),
            'role_id'=>1,
            'is_active'=>1,
            'email'=>Str::random(10).'@codefaculty.com',
            'password'=>bcrypt('secret')
        ]);
    }
}
