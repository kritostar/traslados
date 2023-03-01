<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'listar-tramite']);
        Permission::create(['name' => 'alta-tramite']);
        Permission::create(['name' => 'auditar-tramite']);
        Permission::create(['name' => 'eliminar-tramite']);
        Permission::create(['name' => 'imprimir-tramite']);
        Permission::create(['name' => 'admin-users']);


        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $adminRole->givePermissionTo([
            'listar-tramite',
            'alta-tramite',
            'auditar-tramite',
            'eliminar-tramite',
            'imprimir-tramite',
            'admin-users',
        ]);

        $editorRole->givePermissionTo([
            'listar-tramite',
            'imprimir-tramite',
        ]);
    }
}
