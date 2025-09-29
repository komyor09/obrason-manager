<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'company_owner'],
            ['name' => 'customer'],
        ];

        foreach ($roles as $role) {
            UserRole::firstOrCreate($role);
        }
    }
}
