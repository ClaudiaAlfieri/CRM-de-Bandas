<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function returnAllUsersView() {
        $allUsers = DB::table('users')->get();
        $usersFromDB = DB::table('users')->get();

        return view('users.all_users', compact('allUsers', 'usersFromDB'));
    }

    public function returnAddUsersview(){
        $users = DB::table('users')->get();
        return view('users.add_users', compact('users'));
    }

    public function createUsers(Request $request)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|unique:users|max:50',
            'password' => 'required|min:6',
        ]);



        // Inserir User usando DB::table()
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('users')->with('message', 'User added successfully!');
    }

    public function deleteUser($id){
        DB::table('users')->where('id', $id)->delete();
        return back();
    }

    public function usersView($id){
        $ourUser = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('users.usersView', compact('ourUser'));
    }

    public function updateUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        DB::table('users')->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now(),
            ]);

        return redirect()->route('users')->with('message', 'User updated successfully!');
    }
}