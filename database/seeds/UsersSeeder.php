<?php

use App\User;
use Illuminate\Database\Seeder;

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
            [
                'last_name' => 'системный',
                'first_name' => 'Администратор',
                'middle_name' => null,
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('321'),
                'remember_token' => Str::random(10),
                'is_admin' => true,
                'avatar' => 'storage/images/admin.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'last_name' => 'обычный',
                'first_name' => 'Пользователь',
                'middle_name' => null,
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'avatar' => 'storage/images/user.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        factory(User::class, 100)->create();
    }
}
