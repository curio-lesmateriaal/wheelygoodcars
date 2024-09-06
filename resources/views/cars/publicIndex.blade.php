@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alle auto's te koop</h1>
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top"
                            alt="{{ $car->brand }} {{ $car->model }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                            @if ($car->sold_at)
                                <p class="card-text">Status: Verkocht</p>
                            @else
                                <p class="card-text">Prijs: €{{ $car->price }}</p>
                            @endif
                            <p class="card-text">Kilometerstand: {{ $car->mileage }} km</p>
                            <p class="card-text">Bouwjaar: {{ $car->production_year }}</p>
                            <p class="card-text">Geplaatst door: {{ $car->user->name }}</p>
                            <a href="{{ route('cars.publicShow', $car->id) }}" class="btn btn-primary">Bekijk details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
