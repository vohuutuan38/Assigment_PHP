<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $params = [];
        $user = Auth::user();
        $params['id'] = $user->id;
        $params['name'] = $user->name;
        $params['phone'] = $user->phone;
        $params['address'] = $user->address;
        $params['email'] = $user->email;
        // dd($params);
        return view('clients.account.index', $params);
    }
    function update(Request $request)
    {
        $id = Auth::user()->id;
        $params = $request->all();
        $user = User::findOrFail($id);
        $user->update($params);
        return redirect()->route('account.index');
    }
    function destroy()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        // dd($user);
        $user->delete();
        return redirect()->route('logout');
    }
    function changePassword(Request $request)
    {
        $params = $request->validate(
            [
                'oldPassword' => 'required',
                'newPassword' => 'required|min:5|confirmed',
            ]
        );
        // dd($params['oldPassword']);
        $user = Auth::user();

        if (!Hash::check($params['oldPassword'], $user->password)) {
            return redirect()->route('account.index')->with(['error' => "Incorrect password"]);
        }
        $user->password = Hash::make($params['newPassword']);
        $user->save();
        return redirect()->route('account.index')->with(['error' => "Change password success"]);
    }
}
