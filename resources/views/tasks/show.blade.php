@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-4xl font-bold mb-4">{{ $task->title }}</h1>
        <p class="text-gray-700 mb-6">{{ $task->description }}</p>

        <div class="flex space-x-4">
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Retour
            </a>
            <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Modifier
            </a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
