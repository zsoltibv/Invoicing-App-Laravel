<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DateContController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.date-cont', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateForm($request);

        $user = (new User)->updateUser($data, $id);

        return redirect()->route('account.date-cont', compact('user'))->with('message', 'Account updated successfully');
    }

    public function validateForm($request)
    {
        return $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'old_password' => 'required|min:3|max:500',
            'new_password' => 'nullable|min:3|max:500',
        ]);
    }
}
