<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Hash;
use Spatie\Permission\Traits\HasRoles;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user= User::create([
            'fname' => 'Admin',
            'lname' => 'Admin',
            'mi' => 'A',
            'image' => 'p1.png',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
        $role = Role::create([
            'role' => '2',
            'name' => 'Admin',
        ]);
        $user->roles()->sync($role->id);
        $user= User::create([
            'fname' => 'Rodolfo',
            'lname' => 'Vallen',
            'mi' => 'U',
            'image' => 'p2.jpg',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
        $role = Role::create([
            'role' => '0',
            'name' => 'user',
        ]);
        $user->roles()->sync($role->id);
        $user= User::create([
            'fname' => 'Teresa',
            'lname' => 'Dutch',
            'mi' => 'U',
            'image' => '',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
        $role = Role::create([
            'role' => '1',
            'name' => 'tutor',
        ]);
        $user->roles()->sync($role->id);
    }
}
