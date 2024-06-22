@extends('base')
@section('content')

<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-5 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-5">Volver</button>
    <div class="w-[60%]">
        <h1 class="font-bold text-6xl text-center">Añadir usuario</h1>

        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-x-4">

                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="w-full p-2 my-2 border border-gray-300 rounded" required>
                </div>

                <div>
                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname" class="w-full p-2 my-2 border border-gray-300 rounded" required>
                </div>

                <div>
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" class="w-full p-2 my-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" class="w-full p-2 my-2 border border-gray-300 rounded" required>
                </div>

                <div>
                    <label for="password">Contraseña</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full p-2 my-2 border border-gray-300 rounded" required>
                        <button type="button" onclick="seePassword()" class="absolute top-4 right-2">
                            <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </button>
                    </div>
                </div>

                <div>
                    <label for="age">Edad</label>
                    <input type="number" name="age" class="w-full p-2 my-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="hours_sleep">Horas de sueño</label>
                    <input type="number" name="hours_sleep" class="w-full p-2 my-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="semanal_activity">Horas de Actividad semanal</label>
                    <input type="text" name="semanal_activity" class="w-full p-2 my-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="nacionality">Nacionalidad</label>
                    <input type="text" name="nacionality" class="w-full p-2 my-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="user_types_id">Tipo de usuario</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="user_types_id">
                        @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="file" accept=".jpg, .png" name="profile_picture" id="image" />
            <img id="preview" src="{{ url('storage/images/placeholder-image.webp') }}" alt="user" class="max-h-60">

            @foreach($courses as $course)
            <div>
                <input type="checkbox" id="course{{ $course->id }}" name="courses[]" value="{{ $course->id }}">
                <label for="course{{ $course->id }}">{{ $course->name }}</label>
            </div>
            @endforeach


            <button type="submit" class="bg-purple-600 text-white py-4 rounded-md mt-4 w-full">Guardar</button>
        </form>
    </div>
</div>
<script>
    function seePassword() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type == "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
@endsection