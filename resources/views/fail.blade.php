@extends('layouts.master')
@section('content')
    <div class="container mx-auto max-w-lg p-4">
        <h2 class="text-2xl font-bold mb-4 text-red-700">Bezahlung fehlgeschlagen!</h2>
        <p>Bestellung #{{ $order->id }} konnte nicht abgeschlossen werden.</p>
    </div>
@endsection