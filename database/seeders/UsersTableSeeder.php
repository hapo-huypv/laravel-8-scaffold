<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

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
            'name' => 'Hapo Tester1',
            'email' => 'test1@haposoft.com',
            'password' => bcrypt('12345678'),
            'username' => 'hapohuy1',
        ]);
    }
}
