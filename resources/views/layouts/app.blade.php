@extends('layouts.master')
@section('content')





    @guest
    @if (Route::has('login'))
            <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em] "
                href="{{ route('login') }}">
                <span class="truncate">Login</span> </a>
        @endif
        @if (Route::has('register'))
            <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em] mr-2"
                href="{{ route('register') }}">
                <span class="truncate">Registrieren</span> </a>
        @endif
    @else
        <li>
            <a href="#">{{auth::user()->name}}</a>
        </li>
        <li>
            <a  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em] mr-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Abmelden
            </a>
            <form  action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>

    @endguest


@endsection