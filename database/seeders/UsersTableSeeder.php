<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Автор неизвестен',
                'email'    => 'author_unknown@g.g',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name'     => 'Автор',
                'email'    => 'author1@g.g',
                'password' => bcrypt('12345'),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
