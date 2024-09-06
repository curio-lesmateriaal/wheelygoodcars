@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stap 1: Vul het kenteken in</h1>
        <form id="step1Form" action="{{ route('step1') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="license_plate">Kenteken:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="nl-flag">NL</span>
                            <img src="{{ asset('storage/images/2048px-European_stars.svg.png') }}" alt="EU"
                                class="ml-1" style="height: 1.5rem;">
                        </span>
                    </div>
                    <input type="text" id="license_plate" name="license_plate" class="form-control license-plate-input"
                        placeholder="XX-99-99, X-999-TG, of andere geldige formaten"
                        pattern="([A-Z]{2}-\d{2}-\d{2})|([A-Z]{2}-\d{2}-[A-Z]{2})|([A-Z]{2}-\d{3}-[A-Z])|([A-Z]-\d{3}-[A-Z]{2})|(\d{2}-[A-Z]{2}-\d{2})|(\d{2}-[A-Z]{3}-\d)|(\d-[A-Z]{3}-\d{2})|(\d{3}-[A-Z]{2}-\d{1})"
                        required>
                </div>
                <small id="license_plate_help" class="form-text text-muted">Voorbeeld: XX-99-99</small>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Volgende</button>
        </form>

        <!-- Progress bar voor stap 1 -->
        <div class="progress mt-4">
            <div id="step1Progress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#step1Form').on('input', function() {
                updateProgressBar();
            });

            function updateProgressBar() {
                var progress = 0;
                if ($('#license_plate').val()) {
                    progress = 100;
                }
                $('#step1Progress').css('width', progress + '%').attr('aria-valuenow', progress).text(progress +
                    '%');
            }
        });
    </script>
@endsection
