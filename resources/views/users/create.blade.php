@extends('base')
@section('content')

<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-5 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-5 hover:bg-blue-800 transition duration-300">Volver</button>
    <div class="w-[60%] bg-white p-8 rounded-lg shadow-lg">
        <h1 class="font-bold text-5xl text-center mb-8">Añadir usuario</h1>

        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="name" class="block text-lg font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="lastname" class="block text-lg font-medium text-gray-700">Apellido</label>
                    <input type="text" name="lastname" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-lg font-medium text-gray-700">Nombre de usuario</label>
                    <input type="text" name="username" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-lg font-medium text-gray-700">Contraseña</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                        <button type="button" onclick="seePassword()" class="absolute top-4 right-2">
                            <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="age" class="block text-lg font-medium text-gray-700">Edad</label>
                    <input type="number" name="age" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="hours_sleep" class="block text-lg font-medium text-gray-700">Horas de sueño</label>
                    <input type="number" name="hours_sleep" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="semanal_activity" class="block text-lg font-medium text-gray-700">Horas de Actividad semanal</label>
                    <input type="text" name="semanal_activity" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="nacionality" class="block text-lg font-medium text-gray-700">Nacionalidad</label>
                    <input type="text" name="nacionality" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="user_types_id" class="block text-lg font-medium text-gray-700">Tipo de usuario</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" name="user_types_id">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="profile_picture" class="block text-lg font-medium text-gray-700">Foto de perfil</label>
                <input type="file" accept=".jpg, .png" name="profile_picture" id="image" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition duration-300">
            </div>
            <img id="preview" src="{{ url('storage/images/placeholder-image.webp') }}" alt="user" class="max-h-60 mb-4 mx-auto rounded-full shadow-md">
            @foreach($courses as $course)
            <div>
                <input type="checkbox" id="course{{ $course->id }}" name="courses[]" value="{{ $course->id }}">
                <label for="course{{ $course->id }}">{{ $course->name }}</label>
            </div>
            @endforeach

            <button type="submit" class="bg-purple-600 text-white py-4 rounded-lg w-full hover:bg-purple-700 transition duration-300">Guardar</button>
        </form>
    </div>
</div>

<script>
    function seePassword() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

@endsection