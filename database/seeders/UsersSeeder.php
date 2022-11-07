<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'tray',
            'email' => 'tray@tray.com',
            'password' => Hash::make('qK)gNBz5)3}WxSm?'),
            'token' => base64_encode('tray@tray.com:qK)gNBz5)3}WxSm?')
        ]);
    }
}
