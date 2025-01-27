<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Your Todo List</h1>

        <!-- Button to add new Todo -->
        <div class="mb-4">
            <a href="{{ route('todo.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Todo</a>
        </div>

        <ul class="space-y-2">
            @foreach ($todos as $todo)
                <li class="flex items-center space-x-4">
                    <input type="checkbox" @if($todo->completed) checked @endif>
                    <span class="{{ $todo->completed ? 'line-through text-gray-400' : '' }}">{{ $todo->title }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Your Todo List</h1>

        <livewire:todo-list />
    </div>
@endsection
