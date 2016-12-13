<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use App\Models\Transaction;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $categories = Category::getCategories();
        $carts = Transaction::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        return view('profile.index',[
            'user' => $user,
            'categories' => $categories,
            'carts' => $carts,
        ]);
    }

    public function update(Request $request, $userID)
    {
        $user = User::find($userID);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with(['status' => 'Update profile successfully!']);
    }

    public function changePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password))
        {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
