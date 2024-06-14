@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $car->brand }} {{ $car->model }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid"
                    alt="{{ $car->brand }} {{ $car->model }}">
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Merk:</strong> {{ $car->brand }}</li>
                    <li class="list-group-item"><strong>Model:</strong> {{ $car->model }}</li>
                    @if ($car->sold_at)
                        <li class="list-group-item"><strong>Status:</strong> Verkocht</li>
                    @else
                        <li class="list-group-item"><strong>Prijs:</strong> €{{ $car->price }}</li>
                    @endif
                    <li class="list-group-item"><strong>Kilometerstand:</strong> {{ $car->mileage }} km</li>
                    <li class="list-group-item"><strong>Bouwjaar:</strong> {{ $car->production_year }}</li>
                    <li class="list-group-item"><strong>Aantal zitplaatsen:</strong> {{ $car->seats }}</li>
                    <li class="list-group-item"><strong>Aantal deuren:</strong> {{ $car->doors }}</li>
                    <li class="list-group-item"><strong>Gewicht:</strong> {{ $car->weight }} kg</li>
                    <li class="list-group-item"><strong>Kleur:</strong> {{ $car->color }}</li>
                    <li class="list-group-item"><strong>Geplaatst door:</strong> {{ $car->user->name }}</li>
                </ul>
                <p id="viewCount">Aantal keer bekeken: {{ $car->views }}</p>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('cars.publicIndex') }}" class="btn btn-secondary">Terug naar overzicht</a>
            <!-- Hier kun je eventueel andere acties toevoegen, zoals het toevoegen aan favorieten, contact opnemen met verkoper, etc. -->
        </div>
    </div>

    <!-- JavaScript voor de popup -->
    <script>
        // Wacht 10 seconden na het laden van de pagina
        setTimeout(function() {
            var viewCount = {{ $car->views }};
            if (viewCount > 10) {
                alert(viewCount + ' mensen hebben deze advertentie al bekeken.');
            }
        }, 10000); // 10 seconden = 10000 milliseconden
    </script>
@endsection
