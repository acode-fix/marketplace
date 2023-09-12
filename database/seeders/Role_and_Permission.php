<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Permissions\Permit;
use App\Models\User;

class Role_and_Permission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create roles

        //Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        $permission = Permission::create(['name' => PERMIT::CAN_CREATE_ADMIN,'guard_name' => 'web']);
        $permission = Permission::create(['name' => PERMIT::CAN_VIEW_ADMIN, 'guard_name' => 'web']);
        $permission = Permission::create(['name' => PERMIT::CAN_STORE_ADMIN, 'guard_name' => 'web']);
        $permission = Permission::create(['name' => PERMIT::CAN_EDIT_ADMIN,'guard_name' => 'web']);
        $permission = Permission::create(['name' => PERMIT::CAN_DELETE_ADMIN, 'guard_name' => 'web']);

         $permission = Permission::create(['name' => PERMIT::CAN_CREATE_USER, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_VIEW_USER, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_STORE_USER, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_EDIT_USER, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_DELETE_USER, 'guard_name' => 'web']);

         $permission = Permission::create(['name' => PERMIT::CAN_UPLOAD_PRODUCT,'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_VIEW_PRODUCT, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_STORE_PRODUCT, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_EDIT_PRODUCT, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_DELETE_PRODUCT, 'guard_name' => 'web']);

         $permission = Permission::create(['name' => PERMIT::CAN_VIEW_REVIEW, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_UPLOAD_REVIEW, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_DELETE_REVIEW, 'guard_name' => 'web']);
         $permission = Permission::create(['name' => PERMIT::CAN_STORE_REVIEW, 'guard_name' => 'web']);

         //assign permission to role
         //$permission->assignRole($roleAdmin, $roleSuper_admin);

          // create demo users
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'user@example.com',
        // ]);

         
         //give permissions to Super admin
        // $roleSuper_admin->givePermissionTo(Permission::all());

        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'web'] );
        $roleMarket_user = Role::create(['name' => 'market_user', 'guard_name' => 'web']);
        $roleSuper_admin = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);


        //give permissions to Admin
         $roleAdmin->givePermissionTo([
        PERMIT::CAN_VIEW_ADMIN,
        PERMIT::CAN_STORE_ADMIN,
        PERMIT::CAN_EDIT_ADMIN,
        PERMIT::CAN_DELETE_ADMIN,

         PERMIT::CAN_CREATE_USER,
         PERMIT::CAN_VIEW_USER,
         PERMIT::CAN_STORE_USER,
         PERMIT::CAN_EDIT_USER,
         PERMIT::CAN_DELETE_USER,

         PERMIT::CAN_UPLOAD_PRODUCT,
         PERMIT::CAN_VIEW_PRODUCT,
         PERMIT::CAN_STORE_PRODUCT,
         PERMIT::CAN_EDIT_PRODUCT,
         PERMIT::CAN_DELETE_PRODUCT,

         PERMIT::CAN_VIEW_REVIEW,
         PERMIT::CAN_UPLOAD_REVIEW,
         PERMIT::CAN_DELETE_REVIEW,
         PERMIT::CAN_STORE_REVIEW,
      ]);

      //give permission to Market users
      $roleMarket_user->givePermissionTo([


         PERMIT::CAN_UPLOAD_PRODUCT,
         PERMIT::CAN_VIEW_PRODUCT,
         PERMIT::CAN_STORE_PRODUCT,
         PERMIT::CAN_EDIT_PRODUCT,
         PERMIT::CAN_DELETE_PRODUCT,

         PERMIT::CAN_VIEW_REVIEW,
         PERMIT::CAN_UPLOAD_REVIEW,

      ]);


       $user =  User::find(1);
       $user->assignRole($roleAdmin);


    }
}
