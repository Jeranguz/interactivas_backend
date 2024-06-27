@extends('base')

@section('content')
<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-gray-900 rounded-xl text-2xl text-white fixed top-15 right-4 hover:bg-gray-600 transition duration-300">Volver</button>
    <div class="w-[80%] mx-auto mt-10 px-4">
        @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <p>{{ $message }}</p>
        </div>
        @endif
        <h1 class="font-bold text-4xl text-center mb-8">Lista de usuarios</h1>
        <div class="flex justify-end mb-6">
            <a class="px-6 py-3 bg-blue-900 text-white rounded-md shadow-md hover:bg-blue-800 transition duration-300" href="{{route('users.create')}}">Añadir usuario</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="w-full table-auto">
                <thead class="border-b border-neutral-200 bg-gray-200 font-medium ">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Tipo de usuario</th>
                        <th class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-300">
                        <td class="px-4 py-2 text-center">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-center">{{ $user->name . " " . $user->lastname }}</td>
                        <td class="px-4 py-2 text-center">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-center">{{ $user->type }}</td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2 justify-center">
                                <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                <a class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300" href="{{ route('users.show', $user->id) }}">Detalles</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
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