@extends('layouts.app')
@section('content')
   <h2>Vul het kenteken in</h2>
   <form action = "#""method = "post">
      <div class="form-group">
            <label for="kenteken">Kenteken:</label>
            <input type="text" class="form-control" id="kenteken" placeholder="Voer kenteken in" name="kenteken">
      </div>
      <a href="/auto/aanbod/stap2">
         <button type="submit" class="btn btn-primary">Verstuur</button>
      </a>
@endsection
