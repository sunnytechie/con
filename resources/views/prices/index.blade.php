@extends('layouts.v23')
@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-6 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Books Module Prices</h6>
                </div>


                <div class="card-body">
                    <form action="{{ route('price.update', $price->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="daily_dynamite">Daily Dynamite</label>
                            <input type="text" name="daily_dynamite" id="daily_dynamite" class="form-control" value="{{ $price->daily_dynamite }}">
                        </div>

                        <div class="form-group">
                            <label for="daily_fountain">Daily Fountain</label>
                            <input type="text" name="daily_fountain" id="daily_fountain" class="form-control" value="{{ $price->daily_fountain }}">
                        </div>

                        <div class="form-group">
                            <label for="bible_study">Bible Study</label>
                            <input type="text" name="bible_study" id="bible_study" class="form-control" value="{{ $price->bible_study }}">
                        </div>

                        <div class="form-group">
                            <label for="cyc">CYC</label>
                            <input type="text" name="cyc" id="cyc" class="form-control" value="{{ $price->cyc }}">
                        </div>

                        <div class="form-group">
                            <label for="cyc_calender">CYC Calendar</label>
                            <input type="text" name="cyc_calender" id="cyc_calender" class="form-control" value="{{ $price->cyc_calender }}">
                        </div>

                        <div class="form-group">
                            <label for="bcp">Bcp</label>
                            <input type="text" name="bcp" id="bcp" class="form-control" value="{{ $price->bcp }}">
                        </div>

                        <div class="form-group">
                            <label for="hymnal">Hymnals</label>
                            <input type="text" name="hymnal" id="hymnal" class="form-control" value="{{ $price->hymnal }}">
                        </div>

                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@section('script')
<script>
    // Function to check if the input is a number
    function isNumber(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        // Check if the pressed key is not a number
        if (charCode < 48 || charCode > 57) {
            evt.preventDefault();
            return false;
        }
        return true;
    }

    // Add event listeners to the input fields
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('daily_dynamite').addEventListener('keypress', isNumber);
        document.getElementById('daily_fountain').addEventListener('keypress', isNumber);
        document.getElementById('bible_study').addEventListener('keypress', isNumber);
        document.getElementById('cyc').addEventListener('keypress', isNumber);
        document.getElementById('cyc_calender').addEventListener('keypress', isNumber);
        document.getElementById('bcp').addEventListener('keypress', isNumber);
        document.getElementById('hymnal').addEventListener('keypress', isNumber);
    });
    </script>

@endsection
