@extends('base')

@section('content')
<div class="container mx-auto py-12">
    <a class="px-8 py-4 bg-gray-900 rounded-xl text-2xl text-white fixed top-4 right-4 hover:bg-gray-600 transition duration-300" href="{{ route('admin.index') }}">Volver</a>
    <div class="w-full md:w-3/5 mx-auto">
        <h1 class="font-bold text-6xl text-center mb-8">Lista de Cursos</h1>
        <div class="flex justify-end mb-6">
            <a class="bg-blue-600 py-3 px-6 rounded-md text-white shadow-md hover:bg-blue-700 transition duration-300" href="{{ route('courses.create') }}">Crear Curso</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-700">Nombre</th>
                        <th class="px-6 py-3 text-left text-gray-700">Descripción</th>
                        <th class="px-6 py-3 text-gray-700 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr class="border-b border-gray-300">
                        <td class="px-6 py-4">{{ $course->name }}</td>
                        <td class="px-6 py-4">{{ $course->description }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300" href="{{ route('courses.edit', $course->id) }}">Editar</a>
                                <a class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300" href="{{ route('courses.show', $course->id) }}">Detalles</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
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
</div>
@endsection