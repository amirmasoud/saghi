<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'read category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);

        Permission::create(['name' => 'create comment']);
        Permission::create(['name' => 'read comment']);
        Permission::create(['name' => 'update comment']);
        Permission::create(['name' => 'delete comment']);

        Permission::create(['name' => 'create tag']);
        Permission::create(['name' => 'read tag']);
        Permission::create(['name' => 'update tag']);
        Permission::create(['name' => 'delete tag']);

        Permission::create(['name' => 'create book']);
        Permission::create(['name' => 'read book']);
        Permission::create(['name' => 'update book']);
        Permission::create(['name' => 'delete book']);

        Permission::create(['name' => 'create section']);
        Permission::create(['name' => 'read section']);
        Permission::create(['name' => 'update section']);
        Permission::create(['name' => 'delete section']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);
    }
}
