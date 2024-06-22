@extends('base')

@section('content')

<div class="container mx-auto py-12">
    <h1 class="font-bold text-6xl text-center mb-12">Panel de administrador</h1>
    <div class="grid gap-6 md:grid-cols-3">
        <a class="bg-blue-600 py-8 text-4xl font-semibold text-center rounded-md text-white shadow-md hover:bg-blue-700 transition duration-300" href="{{ route('courses.index') }}">
            Cursos
        </a>
        <a class="bg-blue-600 py-8 text-4xl font-semibold text-center rounded-md text-white shadow-md hover:bg-blue-700 transition duration-300" href="{{ route('events.index') }}">
            Eventos
        </a>
        <a class="bg-blue-600 py-8 text-4xl font-semibold text-center rounded-md text-white shadow-md hover:bg-blue-700 transition duration-300" href="{{ route('users.index') }}">
            Usuarios
        </a>
    </div>
</div>

@endsection