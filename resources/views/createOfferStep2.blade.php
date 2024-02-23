@extends('layouts.app')
@section('content')
   <h2>Vul het kenteken in</h2>
   <form action="#" method="post">
    <div class="form-group">
        <label for="kenteken">Kenteken:</label>
        <input type="text" class="form-control" id="kenteken" placeholder="Voer kenteken in" name="kenteken">
    </div>
    <div class="form-group">
        <label for="merk">Merk:</label>
        <input type="text" class="form-control" id="merk" placeholder="Voer merk in" name="merk">
    </div>
    <div class="form-group">
        <label for="model">Model:</label>
        <input type="text" class="form-control" id="model" placeholder="Voer model in" name="model">
    </div>
    <div class="form-group">
        <label for="zitplaatsen">Zitplaatsen:</label>
        <input type="number" class="form-control" id="zitplaatsen" placeholder="Voer aantal zitplaatsen in" name="zitplaatsen">
    </div>
    <div class="form-group">
        <label for="aantal_deuren">Aantal deuren:</label>
        <input type="number" class="form-control" id="aantal_deuren" placeholder="Voer aantal deuren in" name="aantal_deuren">
    </div>
    <div class="form-group">
        <label for="jaar_productie">Jaar van productie:</label>
        <input type="number" class="form-control" id="jaar_productie" placeholder="Voer jaar van productie in" name="jaar_productie">
    </div>
    <div class="form-group">
        <label for="kleur">Kleur:</label>
        <input type="text" class="form-control" id="kleur" placeholder="Voer kleur in" name="kleur">
    </div>
    <div class="form-group">
        <label for="kilometerstand">Kilometerstand:</label>
        <input type="number" class="form-control" id="kilometerstand" placeholder="Voer kilometerstand in" name="kilometerstand">
    </div>
    <div class="form-group">
        <label for="vraagprijs">Vraagprijs:</label>
        <input type="number" class="form-control" id="vraagprijs" placeholder="Voer vraagprijs in" name="vraagprijs">
    </div>
    <button type="submit" class="btn btn-primary">Verstuur</button>
@endsection
