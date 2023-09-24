<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Traits\PermissionsTrait;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name','admin')->get()->first();
        if(!$admin){
            $admin = Role::create(['name' => 'admin']);
        }

        $allPermissionGroups = PermissionsTrait::allPermissionList();

        foreach ($allPermissionGroups as $group => $perms) {
            foreach ($perms as $pr) {
                $newPerm = Permission::create(['name'=> $group.'-'.$pr]);
                $admin->givePermissionTo($newPerm);
            }
        }
    }
}
