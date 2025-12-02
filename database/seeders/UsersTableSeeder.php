<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Product;
use App\Models\Department;
use App\Models\Relationship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        User::create([ // admin
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'type' => 'admin',

        ]);
        User::create([ // client
            'name' => 'عميل 1',
            'phone' => '111111111',
            'email' => 'client@app.com',
            'type' => 'client',
            'password' => bcrypt('123456'),
            'active' => 1,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
