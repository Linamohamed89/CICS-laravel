@extends('layouts.master')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-100 to-blue-200 py-12 px-4">
        <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-8">
            <div class="flex flex-col items-center mb-6">
                <div class="bg-green-500 rounded-full p-3 mb-2">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Registrieren</h2>
                <p class="text-gray-500 text-sm mt-1">Erstelle jetzt dein Konto!</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        autocomplete="name"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300 @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-1">E-Mail-Adresse</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300 @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-1">Passwort</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300 @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password-confirm" class="block text-gray-700 font-medium mb-1">Passwort bestätigen</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300">
                </div>
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded transition">
                    Registrieren
                </button>
            </form>
            <p class="text-sm text-gray-500 mt-6 text-center">
                Du hast schon ein Konto?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline font-semibold">Jetzt anmelden</a>
            </p>
        </div>
    </div>
@endsection