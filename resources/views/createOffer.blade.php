@extends('layouts.app')
@section('content')
    <h2>Vul het kenteken in</h2>
    <form action="/auto/aanbod/stap2" method="post">
        <div class="form-group">
            <label for="kenteken">Kenteken:</label>
            <input type="text" class="form-control" id="kenteken" placeholder="Voer kenteken in" name="kenteken">
        </div>
        <button type="submit" class="btn btn-primary" formaction="{{ route('createOfferStep2') }}">Verstuur</button>
    </form>
@endsection
