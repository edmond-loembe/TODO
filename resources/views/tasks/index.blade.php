@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Liste des tâches</h1>

    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Créer une tâche</a>

    <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Titre</th>
                <th class="py-2 px-4 text-left">Description</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $task->title }}</td>
                <td class="py-2 px-4">{{ $task->description }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('tasks.show', $task) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Voir</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Modifier</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
