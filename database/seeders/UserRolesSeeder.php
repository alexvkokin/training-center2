<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);

        $manager = Role::create(['name' => 'manager']);

        $teacher = Role::create(['name' => 'teacher']);

        $student = Role::create(['name' => 'student']);

        // После регистрации
        $user = Role::create(['name' => 'user']);

        // create demo admin users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.test',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($admin);
    }
}
