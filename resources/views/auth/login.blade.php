@extends('layouts.master')

@section('content')

    @if(session('status'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('status') }}
        </div>
    @endif

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 py-12 px-4">
            <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-8">
                <div class="flex flex-col items-center mb-6">
                    <div class="bg-blue-500 rounded-full p-3 mb-2">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 21v-2a4 4 0 00-8 0v2M12 11a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Login</h2>
                    <p class="text-gray-500 text-sm mt-1">Willkommen zurück! Bitte melde dich an.</p>
                </div>
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-1">E-Mail-Adresse</label>
                        <input id="email" type="email" name="email" required autofocus autocomplete="email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-1">Passwort</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-600">Angemeldet bleiben</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Passwort
                                vergessen?</a>
                        @endif
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded transition">
                        Login
                    </button>
                </form>
            </div>
        </div>
@endsection