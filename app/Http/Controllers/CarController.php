<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Auth;
use PDF;

class CarController extends Controller
{
    // Display step 1 form
    public function step1()
    {
        return view('step1');
    }

    // Handle step 1 form submission
    public function postStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string|max:255',
        ]);

        $request->session()->put('license_plate', $request->input('license_plate'));

        return redirect()->route('step2');
    }

    // Display step 2 form
    public function step2(Request $request)
    {
        $license_plate = $request->session()->get('license_plate');

        if (!$license_plate) {
            return redirect()->route('step1');
        }

        return view('step2', ['license_plate' => $license_plate]);
    }

    // Handle step 2 form submission
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
            'image' => 'required|image|max:2048',
        ]);

        $car = new Car();
        $car->user_id = Auth::id();
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

    // Display all cars on public advertisement page
    public function publicIndex()
    {
        $cars = Car::all();
        return view('cars.publicIndex', compact('cars'));
    }

    // Show details of a specific car
    public function publicShow(Car $car)
    {
        $car->increment('views'); // Increase view count for the car
        return view('cars.publicShow', compact('car'));
    }

    // Display all cars of the logged-in user
    public function index()
    {
        $cars = Auth::user()->cars;
        return view('mycars', compact('cars'));
    }

    // Display form to edit a car
    public function edit(Car $car)
    {
        $this->authorize('update', $car); // Ensure user has permission to edit the car
        return view('editcar', compact('car'));
    }

    // Update a car in the database
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
            'image' => 'nullable|image|max:2048', // Image can be nullable for update
        ]);

        // Retrieve the current car object from the database
        $car = Car::findOrFail($car->id);

        // Update fields from request
        $car->fill($request->only([
            'brand', 'model', 'price', 'mileage', 'seats', 'doors', 'production_year', 'weight', 'color'
        ]));

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image from storage if exists
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }

            // Store new image
            $car->image = $request->file('image')->store('images', 'public');
        }

        // Set sold_at timestamp if sold checkbox is checked
        if ($request->has('sold') && !$car->sold && !$car->sold_at) {
            $car->sold_at = now(); // Assign current timestamp
        } elseif (!$request->has('sold') && $car->sold) {
            $car->sold_at = null; // Clear sold_at timestamp if unchecked
        }

        // Save the updated car instance
        $car->save();

        return redirect()->route('mycars')->with('success', 'Auto succesvol bijgewerkt!');
    }

    // Delete a car from the database
    public function destroy(Car $car)
    {
        $this->authorize('delete', $car); // Ensure user has permission to delete the car

        // Delete the car's image from storage before deleting the car
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('mycars')->with('success', 'Auto succesvol verwijderd!');
    }

    // Generate PDF for a specific car
    public function generatePdf(Car $car)
    {
        // Fetch the car details
        $car->load('user'); // Load the user relationship if needed

        // Generate PDF using dompdf
        $pdf = PDF::loadView('cars.pdf', compact('car'));

        // Optionally, you can save the PDF to disk or stream it to the user
        // Example: Save PDF to storage
        // $pdf->save(storage_path('app/public/pdfs/' . $car->id . '.pdf'));

        // Return the PDF as a download to the user
        return $pdf->download('car_details_' . $car->id . '.pdf');
    }
}

