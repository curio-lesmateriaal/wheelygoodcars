@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stap 2: Vul de autogegevens in</h1>
        <div class="card mb-4">
            <div class="card-header">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-blue text-white">
                            <span class="nl-flag">NL</span>
                            <img src="{{ asset('storage/images/2048px-European_stars.svg.png') }}" alt="EU"
                                class="ml-1" style="height: 1.5rem;">
                        </span>
                    </div>
                    <input type="text" id="license_plate" name="license_plate" class="form-control license-plate-input"
                        value="{{ $license_plate }}" disabled>
                </div>
            </div>
            <div class="card-body">
                <form id="step2Form" action="{{ route('step2') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="license_plate" value="{{ $license_plate }}">

                    <div class="form-group">
                        <label for="brand">Merk:</label>
                        <input type="text" id="brand" name="brand" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" id="model" name="model" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Prijs:</label>
                        <input type="number" id="price" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mileage">Kilometerstand:</label>
                        <input type="number" id="mileage" name="mileage" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Zitplaatsen:</label>
                        <input type="number" id="seats" name="seats" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="doors">Deuren:</label>
                        <input type="number" id="doors" name="doors" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="production_year">Productie jaar:</label>
                        <input type="number" id="production_year" name="production_year" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="weight">Gewicht:</label>
                        <input type="number" id="weight" name="weight" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="color">Kleur:</label>
                        <input type="text" id="color" name="color" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Afbeelding:</label>
                        <input type="file" id="image" name="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>
            </div>
        </div>

        <!-- Progress bar voor stap 2 -->
        <div class="progress mt-4">
            <div id="step2Progress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#step2Form').on('input', function() {
                updateProgressBar();
            });

            function updateProgressBar() {
                var progress = 0;
                // Voeg hier de logica toe om de voortgang te berekenen op basis van ingevulde velden in stap 2
                var filledFields = 0;
                $('#step2Form input[type=text], #step2Form input[type=number]').each(function() {
                    if ($(this).val()) {
                        filledFields++;
                    }
                });

                var totalFields = $('#step2Form input[type=text], #step2Form input[type=number]').length;
                if (totalFields > 0) {
                    progress = (filledFields / totalFields) * 100;
                }

                $('#step2Progress').css('width', progress + '%').attr('aria-valuenow', progress).text(progress +
                    '%');
            }
        });
    </script>
@endsection
