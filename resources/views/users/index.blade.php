@extends('base')

@section('content')
<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-5 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-5">Volver</button>
    <div class="w-[60%] ">
        @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <p>{{ $message }}</p>
        </div>
        @endif
        <h1 class="font-bold text-6xl text-center mb-4">Lista de usuarios</h1>
        <a class="bg-blue-600 py-2 px-4 rounded-md text-white " href="{{route('users.create')}}">Añadir usuario</a>
        <table class="min-w-full mt-8 text-black table-auto">
            <thead class="border-b border-neutral-200 bg-neutral-50 font-medium dark:border-white/10 dark:text-neutral-800">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Tipo de usuario</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-black">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name." ".$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>
                        <form action="{{route('users.destroy', $user->id)}}" class="flex gap-2 py-3" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="px-4 py-2 rounded-md bg-blue-600 text-white" href="{{route('users.edit', $user->id)}}">Editar</a>
                            <a class="px-4 py-2 rounded-md bg-green-600 text-white" href="{{route('users.show', $user->id)}}">Detalles</a>
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