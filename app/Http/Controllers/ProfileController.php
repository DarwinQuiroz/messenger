<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)  
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $user->name = $request->name;
        if($request->password) $user->password = bcrypt($request->password);

        $file = $request->image;
        if($file)
        {
            $path = public_path('/imgs/users');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $user->image = $fileName;
        }

        $user->save();

        return redirect()->back();
    }
}
