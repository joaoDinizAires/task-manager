@extends('layouts.mainlayout')

<div class="container mx-auto p-8">

    <div class="flex justify-between items-center mb-8">
        <h1 class="shadow-md bg-blue-300 p-2 rounded-md text-3xl font-semibold text-white">Task Manager</h1>
        @guest
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="text-blue-500 hover:shadow-md bg-blue-100 p-2 rounded-md">Login</a>
                <a href="{{ route('register') }}" class="text-white bg-blue-500 hover:shadow-md p-2 rounded-md">Registro</a>
            </div>
        @endguest
        @auth
            <div>
                <p class="text-gray-600">Bem-vindo, <span class="font-semibold">{{ auth()->user()->name }}</span></p>
            </div>
        @endauth
    </div>

    <div class="container mx-auto p-8">
        <form class="mb-8" action="{{ route('store.user') }}" method="POST">
            @csrf
            <label for="name" class="block text-sm font-medium text-gray-600">Nome</label>
            <input type="text" id="username" name="username" class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">
            @error('username')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <label for="email" class="block mt-4 text-sm font-medium text-gray-600">E-mail</label>
            <input type="email" id="email" name="email" class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">
            @error('email')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <label for="password" class="block mt-4 text-sm font-medium text-gray-600">Senha</label>
            <input type="password" id="password" name="password" class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">
            @error('password')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <label for="password_confirmation" class="block mt-4 text-sm font-medium text-gray-600">Confirme a Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">Registrar</button>
        </form>

    </div>
</div>
