@extends('base')

@section('content')
<div class="flex justify-center mt-10">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-gray-700 rounded-xl text-2xl text-white fixed top-4 right-4 hover:bg-gray-900 transition duration-300">Volver</button>
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="font-bold text-4xl text-center mb-8">Editar evento</h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-lg font-semibold mb-2">Nombre</label>
                <input type="text" name="title" class="w-full p-3 border border-gray-300 rounded" value="{{ $event->title }}" required />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-semibold mb-2">Descripcion</label>
                <input type="text" name="description" class="w-full p-3 border border-gray-300 rounded" value="{{ $event->description }}" required/>
            </div>

            <div class="mb-4">
                <label for="start" class="block text-lg font-semibold mb-2">Fecha de inicio</label>
                <div class="grid grid-cols-2 gap-x-4">
                    <input type="date" name="start_date" class="w-full p-3 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d') }}" required/>
                    <input type="time" name="start_hour" class="w-full p-3 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->start)->format('H:i') }}" required/>
                </div>
            </div>

            <div class="mb-4">
                <label for="end" class="block text-lg font-semibold mb-2">Fecha de fin</label>
                <div class="grid grid-cols-2 gap-x-4">
                    <input type="date" name="end_date" class="w-full p-3 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d') }}" required/>
                    <input type="time" name="end_hour" class="w-full p-3 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->end)->format('H:i') }}" required/>
                </div>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-semibold mb-2">Imagen</label>
                <input type="file" accept=".jpg, .png" name="image" id="image" class="w-full p-3 border border-gray-300 rounded" />
                <img id="preview" src="{{ url('storage/images/' . $event->image) }}" alt="event" class="mt-4 max-h-60">
            </div>

            <div class="mb-4">
                <label for="tag" class="block text-lg font-semibold mb-2">Etiqueta</label>
                <select class="w-full p-3 border border-gray-300 rounded" name="tag">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $event->tags_id == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-lg font-semibold mb-2">Categoria</label>
                <select class="w-full p-3 border border-gray-300 rounded" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $event->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="course" class="block text-lg font-semibold mb-2">Curso</label>
                <select class="w-full p-3 border border-gray-300 rounded" name="course">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $event->courses_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user" value="{{ $event->users_id }}" />
            <input type="hidden" name="old_image" value="{{ $event->image }}" />
            <input type="hidden" name="status" value="{{ $event->status }}" />

            <button class="bg-purple-600 text-white py-3 rounded-md mt-4 w-full hover:bg-purple-700" type="submit">Guardar</button>
        </form>
    </div>
</div>
@endsection