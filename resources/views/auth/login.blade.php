@extends('layouts.mainlayout')
@section('content')
<div class="flex justify-between items-center mb-8">

    <h1 class="shadow-md bg-blue-100 p-2 rounded-md text-3xl font-semibold">Task Manager</h1>
    
        <div class="flex space-x-4">
            <a href="{{route('login')}}" class="text-blue-500 hover:shadow-md bg-blue-100 p-2 rounded-md">Login</a>
            <a href="{{route('register')}}" class="text-blue-500 hover:shadow-md bg-blue-100 p-2 rounded-md">Registro</a>
        </div>
    
</div>
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-4">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>
    <form action="{{route('user.authenticate')}}" method="post">
        @csrf
        <label for="email" class="block text-sm font-medium text-gray-600">E-mail</label>
        <input type="email" id="email" name="email"
            class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">

        <label for="password" class="block mt-4 text-sm font-medium text-gray-600">Senha</label>
        <input type="password" id="password" name="password"
            class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">

        <button type="submit"
            class="mt-4 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">Login</button>
    </form>
</div>
@endsection