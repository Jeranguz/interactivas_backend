@extends('base')

@section('content')
<div class="flex justify-center relative">
<button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
    <div class="w-[40%]">
        <h1 class="font-bold text-6xl text-center">Crear curso</h1>

        <form action="{{route('courses.store')}}" method="post">
            @csrf
            <label for="name">Nombre</label>
            <input type="text" name="name" class="w-full p-2 my-2 border border-gray-300 rounded" required>

            <label for="name">Descripcion</label>
            <input type="text" name="description" class="w-full p-2 my-2 border border-gray-300 rounded" required>

            <button type="submit" class="bg-purple-600 text-white py-4 rounded-md mt-4 w-full">Guardar</button>
        </form>
    </div>
</div>
@endsection