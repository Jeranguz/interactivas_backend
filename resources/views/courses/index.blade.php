@extends('base')

@section('content')
<div class="flex justify-center">
    <div class="w-[40%]">
        <h1 class="font-bold text-6xl text-center">Lista de cursos</h1>
        <a class="bg-blue-600 py-2 px-4 rounded-md text-white" href="{{route('courses.create')}}">Crear Curso</a>
        <table class="min-w-full mt-8 text-black table-auto">
            <thead class="border-b border-neutral-200 bg-neutral-50 font-medium dark:border-white/10 dark:text-neutral-800">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Descripcion</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr class="border-b border-black">
                    <td>{{$course->name}}</td>
                    <td >{{$course->description}}</td>
                    <td>
                        <form action="{{route('courses.destroy', $course->id)}}" class="flex gap-2 py-3" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="px-4 py-2 rounded-md bg-blue-600 text-white" href="{{route('courses.edit', $course->id)}}">Editar</a>
                            <a class="px-4 py-2 rounded-md bg-green-600 text-white" href="{{route('courses.show', $course->id)}}">Detalles</a>
                            <button class="px-4 py-2 rounded-md bg-red-600 text-white" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection