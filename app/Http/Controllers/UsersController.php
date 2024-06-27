<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



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
        $courses = Course::all();
        $types = UserType::all();
        return view('users.create', compact('types', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('profile_picture');
        if ($file) {
            $file_name = 'user_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/users', $file_name);
        } else {
            $file_name = 'placeholder-image.webp';
        }

        $user = User::create([
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
        $user->courses()->attach($request->courses);
        // $coursesIds = $request->courses;
        // $userId = $user->id;
        // foreach ($coursesIds as $courseId){
        //     UserCourse::create([
        //         'users_id' => $userId,
        //         'courses_id' => $courseId
        //     ]);
        // }

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

        $user_courses = User::select(
            'courses.id as id',
            'courses.name as name'
        )
            ->join('user_courses', 'users.id', '=', 'user_courses.users_id')
            ->join('courses', 'user_courses.courses_id', '=', 'courses.id')
            ->where('users.id', $id)
            ->get();
        // $formated = [];
        // foreach ($user_courses as $courses) {
        //     $formated[] = [
        //         $courses->id,
        //         $courses->name,
        //     ];
        // }
        $user->courses = $user_courses;
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
        $courses = Course::all();
        $types = UserType::all();
        $user_courses = User::select(
            'courses.id as id',
            'courses.name as name'
        )
            ->join('user_courses', 'users.id', '=', 'user_courses.users_id')
            ->join('courses', 'user_courses.courses_id', '=', 'courses.id')
            ->where('users.id', $id)
            ->get();

        // $formated_courses = [];

        // foreach ($courses as $course){
        //     $formated_courses[] = [
        //         'id'=> $course->id,
        //         'name'=> $course->name,
        //     ];
        // }
        $user->courses = $user_courses;

        return view('users.edit', compact('user', 'types', 'courses'));
        // return $user->courses;
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
                $old_file = 'storage/images/users/' . $request->old_image;
                if (File::exists($old_file) && $old_file != 'storage/images/users/placeholder-image.webp') {
                    File::delete($old_file);
                }
                $file_name = 'user_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images/users', $file_name);
            } else {
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
                'profile_picture' => $file_name
            ]);
            $user->courses()->sync($request->courses);
            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
        }
    }

    public function updateUserApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'nacionality' => 'string',
            'age' => 'numeric|gt:0',
            'hours_sleep' => 'numeric',
            'semanal_activity' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        //

        $file = $request->file('profile_picture');
        $user = User::find($request->id);

        if ($user) {
            if ($file != null) {
                $old_file = 'storage/images/users/' . $request->old_image;
                if (File::exists($old_file) && $old_file != 'storage/images/users/placeholder-image.webp') {
                    File::delete($old_file);
                }
                $file_name = 'user_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images/users', $file_name);
            } else {
                $file_name = $request->old_image;
            }
        }
        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'age' => $request->age,
            'hours_sleep' => $request->hours_sleep,
            'semanal_activity' => $request->semanal_activity,
            'nacionality' => $request->nacionality,
            'profile_picture' => $file_name
        ]);

        return response()->json(['success' => 'Perfil actualizado']);
            
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
