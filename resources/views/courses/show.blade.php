@extends('base')

@section('content')
<div class="flex justify-center relative">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
    <div class="w-[40%]">

        <button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
        <h2 class="text-center text-4xl font-bold">{{$course->name}}</h2>
        <p  class="text-center text-2xl">{{$course->description}}</p>
    </div>
</div>

@endsection