<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index',[
            'users' => User::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(User $user)
    {
        return view('user.detail',[
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showRegister()
    {
        return view('user.register');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit',[
           'user' => $user, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->file('new_profile'));
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required',
            // 'new_profile' => 'required'
        ]);

        if($request->filled('new_password')){
            $user->password = Hash::make($request->input('new_password'));
        }

        if($request->hasFile('new_profile')){

            // dd('hit');
            if (file_exists(public_path('storage/'.$user->profile))){
                unlink(public_path('storage/'.$user->profile));
            } 

            $file = $request->file('new_profile'); // Retrieve the uploaded file from the request
            // dd($file);
            $filename = $file->getClientOriginalName(); // Retrieve the original filename
            $path = $file->storeAs(
                'images', $filename
            );
            $user->profile = $path;
        }
        // dd('hit');
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->bio = $data['bio'];

        $user->save();
        return redirect('user')->with('success','User Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $image_path = $user->profile;
        if (file_exists(public_path('storage/' . $image_path))) {
            unlink(public_path('storage/' . $user->profile));
        }

        $user->delete();
        return back()->with('delete', 'User Successfully deleted!');
    }
}
