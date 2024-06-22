@extends('base')

@section('content')
<div class="w-[60%] mx-auto mt-10 px-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="px-8 py-4 bg-gray-900 rounded-xl text-2xl text-white fixed top-4 right-4 hover:bg-gray-600 transition duration-300">Volver</button>
    <h1 class="text-4xl font-bold text-center mb-8">Lista de Eventos</h1>
    <div class="flex justify-end mb-6">
        <a href="{{ route('events.create') }}" class="px-6 py-3 bg-blue-900 text-white rounded-md shadow-md hover:bg-blue-800 transition duration-300">Crear evento</a>
    </div>
    <div class="my-5">
        
        <!--<form class="grid grid-cols-[20%_20%_20%_20%_15%] gap-2" //action="{{ route('events.search') }}" method="GET">
            <div>
                <label for="event" class="block mb-2 text-sm font-medium text-white">Event Name:</label>
                <input id="event" type="text" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="event" placeholder="Event Name" >
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                <select id="category" name="category" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($event) && $event->categories_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="from_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From:</label>
                <input id="from_date" type="date" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="from_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
            </div>
            <div>
                <label for="to_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To:</label>
                <input id="to_date" type="date" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="to_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-[1.9rem]">Search</button>
            </div>
        </form>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <p>{{ $message }}</p>
        </div>
    @endif
    -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-300">
                        <td class="px-4 py-2">{{ $event->title }}</td>
                        <td class="px-4 py-2">{{ $event->description }}</td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2 align-content-center ml-[5.5rem]">
                                <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300" href="{{ route('events.edit', $event->id) }}">Editar</a>
                                <a class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300" href="{{ route('events.show', $event->id) }}">Detalles</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?')">
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
@endsection