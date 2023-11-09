@extends('layouts.mainlayout')
<div class="container mx-auto p-8">

    <div class="flex justify-between items-center mb-8">

        <h1 class="shadow-md bg-blue-100 p-2 rounded-md text-3xl font-semibold">Task Manager</h1>
        @guest
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="text-blue-500 hover:shadow-md bg-blue-100 p-2 rounded-md">Login</a>
                <a href="{{ route('register') }}"
                    class="text-blue-500 hover:shadow-md bg-blue-100 p-2 rounded-md">Registro</a>
            </div>
        @endguest
        @auth
            <div>
                <p class="text-gray-600">Bem-vindo, <span class="font-semibold">{{Auth::User()->username}}</span></p>
                <form action="{{ route('user.logout') }}" method="POST"> @csrf <input class="text-blue-500 hover:shadow-md bg-blue-100 p-2 rounded-md" type="submit" value="Logout"></form>
            </div>
        @endauth
    </div>
    <div class="container mx-auto p-8">


        <form class="mb-8" action="{{ route('task.store') }}" method="POST">
            @csrf
            <label for="title" class="block text-sm font-medium text-gray-600">Título</label>
            <input type="text" id="title" name="title"
                class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">
            @error('title')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <label for="description" class="block mt-4 text-sm font-medium text-gray-600">Descrição</label>
            <textarea id="description" name="description" rows="4"
                class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md"></textarea>
            @error('description')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <label for="dueDate" class="block mt-4 text-sm font-medium text-gray-600">Data de Vencimento</label>
            <input type="date" id="due_date" name="due_date"
                min="{{ now()->toDateString() }}"class="shadow-md bg-blue-100 mt-1 p-2 w-full border rounded-md">
            @error('due_date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <button type="submit"
                class="mt-4 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">Adicionar
                Tarefa</button>
        </form>


        <div>
            <h2 class="text-xl font-semibold mb-4">Lista de Tarefas</h2>
            <ul>
                @forelse ($tasks as $task)
                <li class="bg-white p-4 mb-4 rounded-md shadow-md">
                    <h3 class="text-lg font-semibold mb-2">{{ $task->title }}</h3>
                    <p class="text-gray-600">{{$task->description}}</p>
                    <p class="text-sm text-gray-500 mt-2">Data de Vencimento: {{ $task->due_date }}</p>
                </li>
                @empty
                    <h4>Esse usuario não possui tasks</h4>
                @endforelse

            </ul>
        </div>
    </div>
