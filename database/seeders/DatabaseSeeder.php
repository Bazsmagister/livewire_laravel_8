<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\House;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\HouseSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\CountrySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id'    => '1',
            'name'  => 'Admin Adam',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'phone' => '0623232565321',
        ]);
        // $admin ->assignRole('admin');


        $authuser = User::create([
            'id'    => '2',
            'name'  => 'Authenticated User',
            'email' => 'authuser@authuser.com',
            'password' => bcrypt('authuser'),
            'phone' => '0623232565322',
        ]);
        // $authuser ->assignRole('authuser');

        $visitor = User::create([
            'id'    => '3',
            'name'  => 'Authenticated User B',
            'email' => 'authuserb@authuserb.com',
            'password' => bcrypt('authuserb'),
            'phone' => '0623232565323',
        ]);
        // $visitor ->assignRole('visitor');


        User::factory(15)->create();

        // CitySeeder::class;
        // CountrySeeder::class;
        // StateSeeder::class;

        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,

        ]);

        House::factory(15)->create();
    }
}
