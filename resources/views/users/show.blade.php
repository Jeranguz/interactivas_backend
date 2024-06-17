@extends('base')
@section('content')
<div class="flex justify-center relative pt-4">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
    <div class="w-[60%]">
        <h1 class="font-bold text-6xl text-center">Detalles del usuario</h1>
        <img class="mt-8 w-96 h-96 object-cover m-auto" src="{{ asset('storage/images/users/'.$user->profile_picture) }}" alt="user">
        <h3 class="text-center text-4xl font-bold ">{{$user->name}} {{$user->lastname}}</h2>
        <p  class="text-center text-2xl">{{$user->username}}</p>
        <p  class="text-center text-2xl">{{$user->email}}</p>
        <div class="grid grid-cols-2">
            <p  class="text-center text-2xl">Edad:{{$user->age}}</p>
        </div>
    </div>
</div>

@endsection