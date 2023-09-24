<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $is_page='profile';

        return view('admin.profile.index')->with(compact('user','is_page'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $user = User::find(auth()->user()->id);

            $data = [
                'name' => $request->name ?? $user->name,
                'email' => $request->email ?? $user->name,
            ];

            if (isset($request->password)) {
                $data['password'] = Hash::make($request->password);
            }

            $subcategory = $user->update($data);

            $status = 'success';
            $message = 'User updated successfully';
        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong ' . $th->getMessage();
        }

        return redirect()->route('profile.index')->with($status, $message);
    }

    public function users()
    {
        $users = User::whereNotIn('id',[auth()->user()->id])->get();

        $is_page='users';

        return view('admin.profile.users')->with(compact('users','is_page'));
    }
}
