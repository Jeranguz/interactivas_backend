@extends('base')

@section('content')
<div class="container mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between mb-4">
            <h1 class="text-xl font-bold">Tags</h1>
            <a href="{{ route('tags.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Tag</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ $message }}
            </div>
        @endif

        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr>
                    <th class="border py-2 px-4">Name</th>
                    <th class="border py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td class="border py-2 px-4">{{ $tag->name }}</td>
                        <td class="border py-2 px-4">
                            <a href="{{ route('tags.edit', $tag) }}" class="bg-green-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
