<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Auth;

class CarController extends Controller
{
    public function step1()
    {
        return view('step1');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string|max:255',
        ]);

        $request->session()->put('license_plate', $request->input('license_plate'));

        return redirect()->route('step2');
    }

    public function step2(Request $request)
    {
        $license_plate = $request->session()->get('license_plate');

        if (!$license_plate) {
            return redirect()->route('step1');
        }

        return view('step2', ['license_plate' => $license_plate]);
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'required|integer',
            'doors' => 'required|integer',
            'production_year' => 'required|integer',
            'weight' => 'required|integer',
            'color' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Voeg eventueel meer validatie toe voor de afbeelding
        ]);

        $car = new Car();
        $car->user_id = Auth::id(); // Zorg ervoor dat de gebruiker correct is ingelogd voordat je Auth::id() gebruikt
        $car->license_plate = $request->session()->get('license_plate');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->price = $request->input('price');
        $car->mileage = $request->input('mileage');
        $car->seats = $request->input('seats');
        $car->doors = $request->input('doors');
        $car->production_year = $request->input('production_year');
        $car->weight = $request->input('weight');
        $car->color = $request->input('color');

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('images', 'public');
        }

        $car->save();

        return redirect()->route('step1')->with('success', 'Auto succesvol opgeslagen!');
    }

    // Toon alle auto's op de publieke advertentiepagina
    public function publicIndex()
    {
        $cars = Car::all(); // Haal alle auto's op
        return view('cars.publicIndex', compact('cars'));
    }

    // Toon details van een specifieke auto
    public function publicShow(Car $car)
    {
        // Verhoog het aantal weergaven voor deze auto
        $car->increment('views');

        return view('cars.publicShow', compact('car'));
    }


    // Toon alle auto's van de ingelogde gebruiker
    public function index()
    {
        $cars = Auth::user()->cars; // Haal alle auto's van de ingelogde gebruiker op
        return view('mycars', compact('cars'));
    }

    // Toon het formulier om een auto te bewerken
    public function edit(Car $car)
    {
        $this->authorize('update', $car); // Zorg ervoor dat de gebruiker toestemming heeft om de auto te bewerken
        return view('editcar', compact('car'));
    }

    // Update de auto in de database
    public function update(Request $request, Car $car)
    {
        $this->authorize('update', $car);

        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            'seats' => 'required|integer',
            'doors' => 'required|integer',
            'production_year' => 'required|integer',
            'weight' => 'required|integer',
            'color' => 'required|string|max:255',
            'image' => 'image|max:2048',
        ]);

        $car->update($request->all());

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('images', 'public');
        }

        $car->save();

        return redirect()->route('mycars')->with('success', 'Auto succesvol bijgewerkt!');
    }

    // Verwijder de auto uit de database
    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->delete();
        return redirect()->route('mycars')->with('success', 'Auto succesvol verwijderd!');
    }
}

