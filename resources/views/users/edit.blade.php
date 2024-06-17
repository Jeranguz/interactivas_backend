@extends('base')

@section('content')
<div class="flex justify-center relative">
    <button onclick="location.href='{{ url()->previous() }}'" class="top-0 px-8 py-4 bg-blue-700 rounded-xl text-2xl text-white absolute right-0">Volver</button>
    <div class="w-[40%]">
        <h1 class="font-bold text-6xl text-center">Editar usuario</h1>

        <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-x-4">

                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->name}}" required>
                </div>

                <div>
                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->lastname}}" required>
                </div>

                <div>
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->username}}" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->email}}" required>
                </div>

                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->password}}" required>
                </div>

                <div>
                    <label for="age">Edad</label>
                    <input type="number" name="age" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->age}}">
                </div>
                <div>
                    <label for="hours_sleep">Horas de sueño</label>
                    <input type="number" name="hours_sleep" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->hours_sleep}}">
                </div>
                <div>
                    <label for="semanal_activity">Horas de Actividad semanal</label>
                    <input type="text" name="semanal_activity" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->semanal_activity}}">
                </div>
                <div>
                    <label for="nacionality">Nacionalidad</label>
                    <input type="text" name="nacionality" class="w-full p-2 my-2 border border-gray-300 rounded" value="{{$user->nacionality}}">
                </div>
                <div>
                    <label for="user_types_id">Tipo de usuario</label>
                    <select class="w-full p-2 my-2 border border-gray-300 rounded" name="user_types_id" value="{{$user->name}}">
                        @foreach($types as $type)
                        @if ($type->id == $user->user_types_id)
                        <option value="{{$type->id}}" selected>{{$type->type}}</option>
                        @else
                        <option value="{{$type->id}}">{{$type->type}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <img id="preview" src="{{ asset('storage/images/users/'.$user->profile_picture) }}" alt="user_picture">
            <input type="hidden" name="old_image" value="{{ $user->profile_picture }}">
            <input type="file" accept=".jpg, .png" name="profile_picture" id="image"/>
            <button type="submit" class="bg-purple-600 text-white py-4 rounded-md mt-4 w-full">Actualizar datos</button>
        </form>
    </div>
</div>
@endsection