@extends('base')

@section('content')
    <div class="bg-red-600">
        <a href="{{route('events.create')}}">Crear evento</a>
    </div>
    <tbody>
        @foreach($events as $event)
            <tr class="border-b border-black">
                <td>{{$event->name}}</td>
                <td >{{$event->description}}</td>
                <td>
                    <form action="{{route('events.destroy', $event->id)}}" class="flex gap-2 py-3" method="POST">
                        @csrf
                         @method('DELETE')
                        <a class="px-4 py-2 rounded-md bg-blue-600 text-white" href="{{route('events.edit', $event->id)}}">Editar</a>
                        <a class="px-4 py-2 rounded-md bg-green-600 text-white" href="{{route('events.show', $event->id)}}">Detalles</a>
                        <button class="px-4 py-2 rounded-md bg-red-600 text-white" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection