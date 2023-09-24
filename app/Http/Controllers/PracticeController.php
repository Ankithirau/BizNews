<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PracticeController extends Controller
{
    public function index()
    {
        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // return [$role,$permission];
        // $user = User::find(1);
        // $user->assignRole('writer');
        // $user->givePermissionTo('edit articles');
        $user = User::role('writer')->get(); // Returns only users with the role 'writer'
        // $users = User::create([
        //     'name'=>'John Doe',
        //     'email'=>'doe@gmail.com',
        //     'password'=>Hash::make('password')
        // ]);
        return $user;

    }
}
