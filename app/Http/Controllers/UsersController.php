<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use \Auth;
Use \Alert;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->role == 'admin') {
    		$users = User::all();
            
    		return view('dashboard.core.users.index', compact('users'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function create()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.core.users.create');
        } else {
            return abort(403, 'Unauthorized');
        }
    }

    public function save(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $users = new User;
            $users->name = $request->name;
            $users->role = $request->role;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();

            Alert::success('Users Alert', 'Success Add New User !!');
            return redirect()->route('users');
        } else {
            return abort(403, 'Unauthorized');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'admin') {
            $users = User::where('id', $id)->first();
            return view('dashboard.core.users.edit', compact('users'));
        } else {
            return abort(403, 'Unauthorized');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role == 'admin') {
            if ($id) {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'role' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

                $users = User::find($id);
                $users->name = $request->name;
                $users->role = $request->role;
                $users->email = $request->email;
                $users->password = Hash::make($request->password);
                $users->save();

                Alert::success('Users Alert', 'Success Update User !!');
                return redirect()->route('users');
            } else {
                Alert::error('Users Alert', 'Failed Update Category !!');
                return redirect()->back();
            }
        } else {
            return abort(403, 'Unauthorized');
        }
    }

    public function delete($id)
    {
        if (Auth::user()->role == 'admin') {
            if ($id) {
                User::where('id', $id)->delete();

                Alert::success('Users Alert', 'Success Delete User !!');
                return redirect()->back();
            } else {
                Alert::error('Users Alert', 'Failed Delete User !!');
                return redirect()->back();
            }
        } else {
            return abort(403, 'Unauthorized');
        }
    }
}
