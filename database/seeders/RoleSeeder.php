<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => "user"],
            ['id' => 2, 'name' => "admin"],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
