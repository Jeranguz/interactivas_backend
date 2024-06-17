<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\File;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::select(
            'users.id',
            'users.name',
            'users.lastname',
            'users.email',
            'user_types.type as type'
        )
            ->join('user_types', 'users.user_types_id', '=', 'user_types.id')
            ->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = UserType::all();
        return view('users.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('profile_picture');
        if($file){
            $file_name = 'user_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/users', $file_name);
        }else{
            $file_name='placeholder-image.webp';
        }

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'age' => $request->age,
            'hours_sleep' => $request->hours_sleep,
            'semanal_activity' => $request->semanal_activity,
            'nacionality' => $request->nacionality,
            'user_types_id' => $request->user_types_id,
            'profile_picture' => $file_name
        ]);
        return redirect()->route('users.index');
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::select(
            'users.id',
            'users.name',
            'users.lastname',
            'users.username',
            'users.email',
            'users.age',
            'users.hours_sleep',
            'users.semanal_activity',
            'users.nacionality',
            'user_types.type as type',
            'users.profile_picture'
        )
            ->join('user_types', 'users.user_types_id', '=', 'user_types.id')
            ->where('users.id', $id)
            ->first();
        return view('users.show', compact('user'));
        // return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        $user->password = 
        $types = UserType::all();
        return view('users.edit', compact('user', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $file = $request->file('profile_picture');
        $user = User::find($id);

        if ($user) {
            if ($file != null) {
                $old_file = 'storage/images/users/'.$request->old_image;
                if (File::exists($old_file)) {
                    File::delete($old_file);
                }
                $file_name = 'user_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images/users', $file_name);
            }else{
                $file_name = $request->old_image;
            }
            
            
            
            $user->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'age' => $request->age,
                'hours_sleep' => $request->hours_sleep,
                'semanal_activity' => $request->semanal_activity,
                'nacionality' => $request->nacionality,
                'user_types_id' => $request->user_types_id,
                'profile_picture'=>$file_name
            ]);
            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
        }
        }
        
        /**
         * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user -> delete();
        return redirect()->route('users.index');
    }
}