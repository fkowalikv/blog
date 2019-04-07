<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Post class
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'read posts']);
        Permission::create(['name' => 'update posts']);
        Permission::create(['name' => 'delete posts']);

        // Comment class
        Permission::create(['name' => 'create comments']);
        Permission::create(['name' => 'read comments']);
        Permission::create(['name' => 'update comments']);
        Permission::create(['name' => 'delete comments']);
        Permission::create(['name' => 'like comments']);

        // User class
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'search users']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo([
                'read posts',
                'create comments',
                'like comments',
            ]);

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo([
                'edit posts',
                'update comments',
                'read users',
                'update users',
                'search users',
            ]);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        User::find(1)->assignRole('admin', 'moderator', 'user');
        User::find(2)->assignRole('moderator', 'user');
        User::find(3)->assignRole('user');
    }
}
