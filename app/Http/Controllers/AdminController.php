<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.index');
    }
    public function login()
    {
        //
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $categories = Category::all();
        $courses = Course::all();
        return view('events.create', compact('tags', 'categories', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function check(Request $request)
    {
        // if (!Auth::attempt($request->only('email', 'password'))) {
        //     return redirect()->route('admin.login')->with('error', 'Wrong mail or password');
        // }

        // $user = User::where('email', $request['email'])->firstOrFail();

        // if ($user->user_types_id !== 1) {
        //     return redirect()->route('admin.login')->with('error', 'Unauthorized');
        // } else {
        //     $token = $user->createToken('auth_token')->plainTextToken;
        //     session()->put('auth_token', $token);
        // }
        // return redirect()->route('admin.index');
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        if ($user->user_types_id !== 1) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Unauthorized');
        }
        
        session_start();

        return redirect()->route('events.index');
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::logout();
        //destroy session and variables
        session_start();
        session_destroy();
        //return response()->json(['message' => 'Logged out successfully']);
        return redirect()->route('admin.login');
    }
}
