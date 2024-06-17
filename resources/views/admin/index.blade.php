@extends('base')

@section('content')

<div class="grid justify-center pt-4">

    <h1 class="font-bold text-6xl text-center">Panel de administrador</h1>
    <div class="mt-4 flex justify-center gap-4">
        <a class="bg-blue-600 py-4 text-xl w-full text-center rounded-md text-white" href="{{route('courses.index')}}">Cursos</a>
        <a class="bg-blue-600 py-4 text-xl w-full text-center rounded-md text-white" href="{{route('events.index')}}">Eventos</a>
        <a class="bg-blue-600 py-4 text-xl w-full text-center rounded-md text-white" href="{{route('users.index')}}">Usuarios</a>
    </div>
</div>

@endsection