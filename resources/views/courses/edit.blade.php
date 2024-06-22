@extends('base')

@section('content')
<div class="flex justify-center pt-12 relative">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-4 px-8 py-3 bg-blue-600 rounded-xl text-lg text-white absolute right-4 shadow-md hover:bg-blue-700 transition duration-300">Volver</button>
    <div class="w-full md:w-2/3 lg:w-1/2 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="font-bold text-4xl text-center mb-8">Crear Curso</h1>

        <form action="{{route('courses.update', $course->id)}}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{$course->name}}" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Descripción</label>
                <input type="text" name="description" class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{$course->description}}" required>
            </div>

            <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-md text-lg font-semibold shadow-md hover:bg-purple-700 transition duration-300">Actualizar datos</button>
        </form>
    </div>
</div>
@endsection