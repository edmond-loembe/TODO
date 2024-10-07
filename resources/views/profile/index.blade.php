@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">{{ __('Profile Information') }}</h1>

    @if(session('status') === 'profile-updated')
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ __('Profile updated successfully.') }}
    </div>
    @endif

    <!-- Formulaire de mise à jour du profil -->
    <form method="post" action="{{ route('profile.update', $user->id) }}" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Champ nom -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $user->email) }}" required>
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Message de vérification de l'email -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="mt-4 bg-yellow-100 text-yellow-800 p-4 rounded">
            <p>{{ __('Your email address is unverified.') }}</p>
            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Click here to re-send the verification email.') }}
            </button>

            @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600">{{ __('A new verification link has been sent to your email address.') }}</p>
            @endif
        </div>
        @endif

        <!-- Boutons de soumission -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Save') }}
            </button>

            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">{{ __('Back to Dashboard') }}</a>
        </div>
    </form>
</div>
@endsection
