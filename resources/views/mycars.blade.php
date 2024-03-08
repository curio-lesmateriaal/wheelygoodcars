@extends('layouts.app')
@section('content')


<table>
    <thead>
        <tr>
            <th>License Plate</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
            <th>Mileage</th>
            <th>Seats</th>
            <th>Doors</th>
            <th>Production Year</th>
            <th>Weight</th>
            <th>Color</th>
            <th>Image</th>
            <th>Sold At</th>
            <th>Views</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{ $car->license_plate }}</td>
            <td>{{ $car->make }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->price }}</td>
            <td>{{ $car->mileage }}</td>
            <td>{{ $car->seats }}</td>
            <td>{{ $car->doors }}</td>
            <td>{{ $car->production_year }}</td>
            <td>{{ $car->weight }}</td>
            <td>{{ $car->color }}</td>
            <td>{{ $car->image }}</td>
            <td>{{ $car->sold_at }}</td>
            <td>{{ $car->views }}</td>
            <td>{{ $car->created_at }}</td>
            <td>{{ $car->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection


