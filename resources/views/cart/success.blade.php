@extends('layouts.master')
@section('content')
    <div class="container mx-auto max-w-lg p-4">
        <h2 class="text-2xl font-bold mb-4 text-green-700">Bezahlung erfolgreich!</h2>
        <p>Bestellung #{{ $order->id }} wurde erfolgreich bezahlt.</p>
    </div>
@endsection