@extends('base')

@section('content')
<div class="flex justify-center">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
    <div class="w-[60%]">
        <h1 class="font-bold text-6xl text-center my-8">{{ $event->title }}</h1>

        <div class="flex justify-center mb-8">
            <img src="{{ $event->image }}" alt="" class="max-h-80 rounded-lg">
        </div>

        <div class="bg-gray-100 p-8 rounded-lg shadow-lg">
            <p class="text-2xl">{{ $event->description }}</p>
            <p class="text-2xl mt-4">{{ $event->start }}</p>
            <p class="text-2xl mt-4">{{ $event->end }}</p>
            <p class="text-2xl mt-4">{{ $event->course }}</p>
            <p class="text-2xl mt-4">{{ $event->category }}</p>
            <p class="text-2xl mt-4">{{ $event->tag }}</p>
            <p class="text-2xl mt-4">{{ $event->status }}</p>
            <p class="text-2xl mt-4">{{ $event->percentage }}%</p>
        </div>
    </div>
</div>
@endsection