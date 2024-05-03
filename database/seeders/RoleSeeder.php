<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'publisher']);
        $role->givePermissionTo([
            'create comment',
            'read comment',
            'create book',
            'read book',
            'update book',
            'delete book',
            'create section',
            'read section',
            'update section',
            'delete section',
            'create user',
            'read user',
            'update user',
            'delete user',
        ]);

        $role = Role::create(['name' => 'author']);
        $role->givePermissionTo([
            'create comment',
            'read comment',
            'create book',
            'read book',
            'update book',
            'delete book',
            'create section',
            'read section',
            'update section',
            'delete section',
        ]);

        $role = Role::create(['name' => 'reader']);
        $role->givePermissionTo([
            'create comment',
            'read comment',
            'read book',
            'read section',
        ]);
    }
}
