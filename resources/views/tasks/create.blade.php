@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6">Créer une tâche</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Titre</label>
                <input type="text" name="title" class="border border-gray-300 p-2 w-full rounded" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" class="border border-gray-300 p-2 w-full rounded"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
