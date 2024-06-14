@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn Auto's</h1>
        <div class="row">
            @if (!is_null($cars) && !$cars->isEmpty())
                @foreach ($cars as $car)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                                <p class="card-text">Kenteken: {{ $car->license_plate }}</p>
                                <p class="card-text">Prijs: €{{ $car->price }}</p>
                                <!-- Voeg hier andere informatie toe zoals gewenst -->
                                <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary">Bewerken</a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Weet je zeker dat je deze auto wilt verwijderen?')">Verwijderen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Je hebt nog geen auto's toegevoegd.</p>
            @endif
        </div>
    </div>
@endsection
