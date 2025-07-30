<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.pages.users.userList', compact('users'));
    }

    public function createPage()
    {

        return view('dashboard.pages.users.userCreate');
    }

    public function create(Request $request)
    {


        $data = $this->validateUserData($request);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = (int) $data['role'];

        $user = User::create($data);
        return redirect()->route('dashboard.users')->with('success', 'User created successfully.');

        // Logic to show user creation form
        // return view('dashboard.usersCreate');
    }

    public function edit($id)
    {
        // Logic to show user edit form
        return view('dashboard.users.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update user information
        // Validate and save the user data
        return redirect()->route('dashboard.users')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        // Logic to delete a user
        return redirect()->route('dashboard.users')->with('success', 'User deleted successfully.');
    }



    private function validateUserData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|numeric',
        ]);
    }


}