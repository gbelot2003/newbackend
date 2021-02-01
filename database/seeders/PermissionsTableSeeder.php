<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_permissions')->delete();
        DB::table('permissions')->delete();

        // Permisos de administrador
        $permissions = [
            'users_view', 'users_edit', 'users_suspend'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
