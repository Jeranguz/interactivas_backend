@extends('base')

@section('content')
<div class="flex justify-center">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
    <div class="w-[40%]">
        <h1 class="font-bold text-6xl text-center">Editar evento</h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">Nombre</label>
            <input type="text" name='title' class="w-full p-2 my-2 border border-gray-300 rounded" value="{{ $event->title }}" required />

            <label for="description">Descripcion</label>
            <input type="text" name='description' class="w-full p-2 my-2 border border-gray-300 rounded" value="{{ $event->description }}" required/>

            <label for="start">Fecha de inicio</label>
            <div class="grid grid-cols-2 gap-x-4">
                <input type="date" name='start_date' class="w-full p-2 my-2 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d') }}" required/>
                <input type="time" name='start_hour' class="w-full p-2 my-2 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->start)->format('H:i') }}" required/>
            </div>

            <label for="end">Fecha de fin</label>
            <div class="grid grid-cols-2 gap-x-4">
                <input type="date" name='end_date' class="w-full p-2 my-2 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d') }}" required/>
                <input type="time" name='end_hour' class="w-full p-2 my-2 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($event->end)->format('H:i') }}" required/>
            </div>

            <input type="file" accept=".jpg, .png" name="image" id="image" />
            <div class='flex flex-col sm:flex-row gap-x-4 w-full'>
                <img id="preview" src="{{ url('storage/images/' . $event->image) }}" alt="event" class="max-h-60">
                <div class='w-full'>

                    <label for="tag">Etiqueta</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="tag">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $event->tags_id == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    <label for="category">Categoria</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $event->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    
                    <label for="course">Curso</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="course">
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $event->courses_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <input type="hidden" name='user' value='{{ $event->users_id }}' />
            <input type="hidden" name='status' value='{{ $event->status }}' />
            <button class="bg-purple-600 text-white py-4 rounded-md mt-4 w-full" type='submit'>Guardar</button>
        </form>
    </div>
</div>
@endsection