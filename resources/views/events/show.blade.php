@extends('base')

@section('content')
<div class="flex justify-center mt-10">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-gray-700 rounded-xl text-2xl text-white fixed top-4 right-4 hover:bg-gray-900 transition duration-300">Volver</button>
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="font-bold text-4xl text-center mb-8">{{ $event->title }}</h1>

        <div class="flex justify-center mb-8">
            <img src="{{ $event->image }}" alt="" class="max-h-80 rounded-lg shadow-md">
        </div>

        <div class="bg-gray-100 p-8 rounded-lg shadow-lg space-y-6">
            <p class="text-2xl font-semibold">Descripción</p>
            <p class="text-xl">{{ $event->description }}</p>

            <p class="text-2xl font-semibold">Fecha de inicio</p>
            <p class="text-xl">{{ $event->start }}</p>

            <p class="text-2xl font-semibold">Fecha de fin</p>
            <p class="text-xl">{{ $event->end }}</p>

            <p class="text-2xl font-semibold">Curso</p>
            <p class="text-xl">{{ $event->course }}</p>

            <p class="text-2xl font-semibold">Categoría</p>
            <p class="text-xl">{{ $event->category }}</p>

            <p class="text-2xl font-semibold">Etiqueta</p>
            <p class="text-xl">{{ $event->tag }}</p>

            <p class="text-2xl font-semibold">Estado</p>
            <p class="text-xl">{{ $event->status }}</p>

            <p class="text-2xl font-semibold">Porcentaje</p>
            <p class="text-xl">{{ $event->percentage }}%</p>
        </div>
    </div>
</div>
@endsection