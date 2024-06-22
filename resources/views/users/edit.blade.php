@extends('base')

@section('content')
<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-4 right-4 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute hover:bg-blue-800 transition duration-300">Volver</button>
    <div class="w-[60%] bg-white p-8 rounded-lg shadow-lg">
        <h1 class="font-bold text-5xl text-center mb-8">Editar usuario</h1>

        <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">

                <div class="mb-4">
                    <label for="name" class="block text-lg font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->name}}" required>
                </div>

                <div class="mb-4">
                    <label for="lastname" class="block text-lg font-medium text-gray-700">Apellido</label>
                    <input type="text" name="lastname" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->lastname}}" required>
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-lg font-medium text-gray-700">Nombre de usuario</label>
                    <input type="text" name="username" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->username}}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->email}}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-lg font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->password}}" required>
                </div>

                <div class="mb-4">
                    <label for="age" class="block text-lg font-medium text-gray-700">Edad</label>
                    <input type="number" name="age" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->age}}">
                </div>

                <div class="mb-4">
                    <label for="hours_sleep" class="block text-lg font-medium text-gray-700">Horas de sueño</label>
                    <input type="number" name="hours_sleep" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->hours_sleep}}">
                </div>

                <div class="mb-4">
                    <label for="semanal_activity" class="block text-lg font-medium text-gray-700">Horas de Actividad semanal</label>
                    <input type="text" name="semanal_activity" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->semanal_activity}}">
                </div>

                <div class="mb-4">
                    <label for="nacionality" class="block text-lg font-medium text-gray-700">Nacionalidad</label>
                    <input type="text" name="nacionality" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" value="{{$user->nacionality}}">
                </div>

                <div class="mb-4">
                    <label for="user_types_id" class="block text-lg font-medium text-gray-700">Tipo de usuario</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" name="user_types_id">

                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$type->id == $user->user_types_id ? 'selected' : ''}}>{{$type->type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4 flex flex-col items-center">
                <label for="profile_picture" class="block text-lg font-medium text-gray-700 mb-2">Foto de perfil</label>
                <img id="preview" class="w-48 h-48 object-cover rounded-full mb-4" src="{{ asset('storage/images/users/'.$user->profile_picture) }}" alt="user_picture">
                <input type="hidden" name="old_image" value="{{ $user->profile_picture }}">
                <input type="file" accept=".jpg, .png" name="profile_picture" id="image"  class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition duration-300">
            </div>
            @php
            $enrolledCourseIds = $user->courses->pluck('id')->toArray();
            @endphp
            @foreach($courses as $course)
            <div>
                <input type="checkbox" id="course{{ $course->id }}" name="courses[]" value="{{ $course->id }}" {{ in_array($course->id, $enrolledCourseIds) ? 'checked' : '' }}>
                <label for="course{{ $course->id }}">{{ $course->name }}</label>
            </div>
            @endforeach
            <button type="submit" class="bg-purple-600 text-white py-4 rounded-lg mt-4 w-full hover:bg-purple-700 transition duration-300">Actualizar datos</button>
        </form>
    </div>
</div>
@endsection