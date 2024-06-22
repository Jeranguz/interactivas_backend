@extends('base')

@section('content')
<div class="flex justify-center mt-10">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-gray-700 rounded-xl text-2xl text-white fixed top-4 right-4 hover:bg-gray-900 transition duration-300">Volver</button>
    <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md">
        <h1 class="font-bold text-6xl text-center mb-8">Crear evento</h1>

        <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-xl font-semibold mb-2">Nombre</label>
                <input type="text" placeholder="Nombre de la actividad" name='title' class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-xl font-semibold mb-2">Descripción</label>
                <input type="text" placeholder="Descripción" name='description' class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>

            <div class="mb-4">
                <label for="start" class="block text-xl font-semibold mb-2">Fecha de inicio</label>
                <div class="grid grid-cols-2 gap-4">
                    <input type="date" name='start_date' class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    <input type="time" name='start_hour' class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
                </div>
            </div>

            <div class="mb-4">
                <label for="end" class="block text-xl font-semibold mb-2">Fecha de fin</label>
                <div class="grid grid-cols-2 gap-4">
                    <input type="date" name='end_date' class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    <input type="time" name='end_hour' class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" />
                </div>
            </div>

            <div class="mb-4">
                <input type="file" accept=".jpg, .png" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mb-4">
                <img id="preview" src="{{ url('storage/images/placeholder-image.webp') }}" alt="event" class="max-h-60 rounded-lg shadow-md mx-auto sm:mx-0">
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 mb-4">
                
                <div class='w-full'>
                    <div class="mb-4">
                        <label for="tag" class="block text-xl font-semibold mb-2">Etiqueta</label>
                        <select class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" name="tag">
                            @foreach ($tags as $tag)
                            <option value={{$tag->id}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-xl font-semibold mb-2">Categoría</label>
                        <select class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" name="category">
                            @foreach ($categories as $category)
                            <option value={{$category->id}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="course" class="block text-xl font-semibold mb-2">Curso</label>
                        <select class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" name="course">
                            @foreach ($courses as $course)
                            <option value={{$course->id}}>{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name='user' value='1' />
            <input type="hidden" name='status' value='1' />
            <button class="bg-purple-600 text-white py-4 rounded-md mt-4 w-full hover:bg-purple-700 transition duration-300" type='submit'>Guardar</button>
        </form>
    </div>
</div>
@endsection