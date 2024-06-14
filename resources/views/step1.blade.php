@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stap 1: Vul het kenteken in</h1>
        <form action="{{ route('step1') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="license_plate">Kenteken:</label>
                <input type="text" id="license_plate" name="license_plate" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Volgende</button>
        </form>
    </div>
@endsection
