@extends('base')

@section('content')
<div class="flex justify-center pt-10 relative">
    <button onclick="location.href='{{ url()->previous() }}'" class="absolute top-4 right-4 px-6 py-3 bg-blue-600 rounded-xl text-lg text-white shadow-md hover:bg-blue-700 transition duration-300">Volver</button>
    <div class="w-full md:w-3/4 lg:w-1/2 bg-white p-8 rounded-lg shadow-lg">

        <h2 class="text-center text-4xl font-bold mb-8">{{$course->name}}</h2>
        <p class="text-center text-2xl text-gray-700 mb-4">{{$course->description}}</p>

    </div>
</div>
@endsection