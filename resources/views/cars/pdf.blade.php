<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Auto Details - {{ $car->brand }} {{ $car->model }}</title>
    <style>
        /* Define your styling for the PDF here */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 20px;
        }
        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
        }
        /* Add more styles as needed */
    </style>
</head>
<body>
    <div class="container">
        <h1>Auto Details - {{ $car->brand }} {{ $car->model }}</h1>
        <div class="card">
            <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top"
                alt="{{ $car->brand }} {{ $car->model }}">
            <div class="card-body">
                <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                <p class="card-text">Kenteken: {{ $car->license_plate }}</p>
                @if ($car->sold_at)
                    <p class="card-text">Status: Verkocht</p>
                @else
                    <p class="card-text">Prijs: €{{ $car->price }}</p>
                @endif
                <p class="card-text">Kilometerstand: {{ $car->mileage }} km</p>
                <p class="card-text">Bouwjaar: {{ $car->production_year }}</p>
                <p class="card-text">Geplaatst door: {{ $car->user->name }}</p>
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
</body>
</html>
