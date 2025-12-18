<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $agentRole = Role::create(['name' => 'agent']);
        $userRole = Role::create(['name' => 'user']);

        // Create Admin
        $admin = User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole($adminRole);

        // Create Agent
        $agent = User::create([
            'name' => 'Agent Smith',
            'username' => 'agent',
            'email' => 'agent@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $agent->assignRole($agentRole);

        // Create User
        $user = User::create([
            'name' => 'John Doe',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole($userRole);

        $this->call(PropertySeeder::class);
    }
}
