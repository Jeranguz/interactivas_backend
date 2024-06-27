@extends('base')

@section('content')

<div class="flex justify-center mt-4">
    <div>
        <h1 class="text-center text-6xl font-bold">Admin Login</h1>
        <form action="{{ route('admin.check') }}" method="POST">
            @csrf
            <div class="grid">
                <label for="email">Email</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" name="email">
            </div>
            <div class="grid">
                <label for="password">Password</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password" name="password">
            </div>
            @if(session('error'))
            <div class="text-red-600">
                {{ session('error') }}
            </div>
            @endif
            <button class="w-full py-3 text-white bg-purple-600 mt-4 rounded-lg" type="submit">Login</button>
        </form>

    </div>
</div>
@endsection