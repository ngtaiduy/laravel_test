<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Role
        $roles_default = [
            ['name' => 'Admin'],
            ['name' => 'Nhân viên'],
            ['name' => 'Khách hàng'],
        ];
        DB::table('roles')->insert($roles_default);

        //Users
        $users_default = [
            [
                'name' => 'Admin',
                'dob' => date('Y-m-d'),
                'gender' => User::MALE,
                'phone' => '0385241997',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'avatar' => 'image/users/user-default-avatar.jpg',
                'role_id' => User::ADMIN_ROLE,
                'status' => User::ACTIVE,
            ],
        ];
        DB::table('users')->insert($users_default);

        //Category Post
        $category_post_default = [
            [
                'name' => 'Thể thao',
                'slug' => 'the-thao',
            ],
            [
                'name' => 'Chính trị',
                'slug' => 'chinh-tri',
            ],
            [
                'name' => 'Tài chính',
                'slug' => 'tai-chinh',
            ],
            [
                'name' => 'Du lịch',
                'slug' => 'du-lich',
            ],
            [
                'name' => 'Khác',
                'slug' => 'khac',
            ],
        ];
        DB::table('category_post')->insert($category_post_default);
    }
}
