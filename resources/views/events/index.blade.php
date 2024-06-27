@extends('base')

@section('content')
<div class="w-[60%] mx-auto mt-10 px-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-gray-900 rounded-xl text-2xl text-white fixed top-13 right-4 hover:bg-gray-600 transition duration-300">Volver</button>
    <h1 class="text-4xl font-bold text-center mb-8">Lista de Eventos</h1>
    <div class="flex justify-end mb-6">
        <a href="{{ route('events.create') }}" class="px-6 py-3 bg-blue-900 text-white rounded-md shadow-md hover:bg-blue-800 transition duration-300">Crear evento</a>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-300">
                        <td class="px-4 py-2">{{ $event->title }}</td>
                        <td class="px-4 py-2">{{ $event->description }}</td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2 align-content-center justify-center">
                                <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300" href="{{ route('events.edit', $event->id) }}">Editar</a>
                                <a class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300" href="{{ route('events.show', $event->id) }}">Detalles</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-300" type="submit">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection