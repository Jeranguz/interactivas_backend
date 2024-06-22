@extends('base')
@section('content')
<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-4 hover:bg-blue-800 transition duration-300">Volver</button>
    <div class="w-[60%] bg-white p-8 rounded-lg shadow-lg">
        <h1 class="font-bold text-5xl text-center mb-8">Detalles del usuario</h1>
        <div class="flex justify-center mb-8">
            <img class="w-48 h-48 object-cover rounded-full shadow-md" src="{{ asset('storage/images/users/'.$user->profile_picture) }}" alt="user">
        </div>
        <h3 class="text-center text-4xl font-bold mb-2">{{$user->name}} {{$user->lastname}}</h3>
        <p class="text-center text-2xl text-gray-700 mb-4">{{$user->username}}</p>
        <p class="text-center text-2xl text-gray-700 mb-4">{{$user->email}}</p>
        <div class="grid grid-cols-1 text-center gap-y-4">
            <p class="text-2xl text-gray-700 mb-4">Edad:  {{$user->age}}</p>
            <p  class="text-center text-2xl">Horas de sueño: {{$user->hours_sleep}}</p>
            <p  class="text-center text-2xl">Horas de actividad fisica semanal: {{$user->semanal_activity}}</p>
            <p  class="text-center text-2xl">Nacionalidad: {{$user->nacionality}}</p>
        </div>
        <p  class="text-center text-2xl">Tipo de usuario: {{$user->type}}</p>
        <h2 class="text-center text-2xl pt-8">Cursos</h2>
        @foreach($user->courses as $course)
        <p class="text-center text-2xl">{{$course->name}}</p>
        @endforeach
    </div>
</div>
@endsection