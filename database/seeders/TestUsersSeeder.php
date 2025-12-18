<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $agentRole = Role::firstOrCreate(['name' => 'agent']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'location' => 'Admin City',
            ]
        );
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }
        echo "Admin user created/updated: admin@example.com (password: password)\n";

        // Create Agent User
        $agent = User::firstOrCreate(
            ['email' => 'agent@example.com'],
            [
                'name' => 'Agent User',
                'password' => Hash::make('password'),
                'phone' => '0987654321',
                'location' => 'Agent City',
            ]
        );
        if (!$agent->hasRole('agent')) {
            $agent->assignRole('agent');
        }
        echo "Agent user created/updated: agent@example.com (password: password)\n";

        // Create Regular User
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
                'phone' => '5555555555',
                'location' => 'User City',
            ]
        );
        if (!$user->hasRole('user')) {
            $user->assignRole('user');
        }
        echo "Regular user created/updated: user@example.com (password: password)\n";

        echo "\n✅ Test users created successfully!\n";
        echo "You can now login with:\n";
        echo "- Admin: admin@example.com / password\n";
        echo "- Agent: agent@example.com / password\n";
        echo "- User: user@example.com / password\n";
    }
}
