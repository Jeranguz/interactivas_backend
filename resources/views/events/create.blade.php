@extends('base')

@section('content')
<div class="flex justify-center">
    <div class="w-[40%]">
        <h1 class="font-bold text-6xl text-center">Crear evento</h1>

        <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="title">Nombre</label>
            <input type="text" placeholder="Nombre de la actividad" name='title' class="w-full p-2 my-2 border border-gray-300 rounded" />

            <label for="description">Descripcion</label>
            <input type="text" placeholder="Descripción" name='description' class="w-full p-2 my-2 border border-gray-300 rounded" />

            <label for="start">Fecha de inicio</label>
            <div class="grid grid-cols-2 gap-x-4">
                <input type="date" name='start_date' class="w-full p-2 my-2 border border-gray-300 rounded" />
                <input type="time" name='start_hour' class="w-full p-2 my-2 border border-gray-300 rounded" />
            </div>

            <label for="end">Fecha de fin</label>
            <div class="grid grid-cols-2 gap-x-4">
                <input type="date" name='end_date' class="w-full p-2 my-2 border border-gray-300 rounded" />
                <input type="time" name='end_hour' class="w-full p-2 my-2 border border-gray-300 rounded" />
            </div>

            <input type="file" accept=".jpg, .png" name="image" id="image"/>
            <div class='flex flex-col sm:flex-row gap-x-4 w-full'>
                <img id="preview" src="{{ url('storage/images/placeholder-image.webp') }}" alt="event" class="max-h-60">
                <div class='w-full'>

                    <label for="tag">Etiqueta</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="tag">
                        @foreach ($tags as $tag)
                        <option value={{$tag->id}}>{{$tag->name}}</option>
                        @endforeach
                    </select>

                    <label for="category">Categoria</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="category">
                        @foreach ($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="course">Curso</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="course">
                        @foreach ($courses as $course)
                        <option value={{$course->id}}>{{$course->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <input type="hidden" name='user' value='1' />
            <input type="hidden" name='status' value='1' />
            <button class="bg-purple-600 text-white py-4 rounded-md mt-4 w-full" type='submit'>Guardar</button>
        </form>
    </div>
</div>
@endsection