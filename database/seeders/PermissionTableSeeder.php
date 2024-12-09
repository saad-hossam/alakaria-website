<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'product-list',
           'product-create',
           'product-edit',
           'product-delete',

           'gallary-list',
           'gallary-create',
           'gallary-edit',
           'gallary-delete',

           'service-list',
           'service-create',
           'service-edit',
           'service-delete',

           'category-list',
           'category-create',
           'category-edit',
           'category-delete',

           'department-list',
           'department-create',
           'department-edit',
           'department-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',


        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
