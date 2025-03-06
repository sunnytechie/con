@extends('layouts.v23')
@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-10 offset-md-1">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Books Module Prices</h6>
                </div>


                <div class="card-body">
                    <form class="row" action="{{ route('price.update', $price->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="form-group col-md-3">
                                <label for="daily_dynamite">Daily Dynamite(NGN)</label>
                                <input type="text" name="daily_dynamite" id="daily_dynamite" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_dynamite }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="daily_dynamite_usd">Daily Dynamite(USD)</label>
                                <input type="text" name="daily_dynamite_usd" id="daily_dynamite_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_dynamite_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="daily_dynamite_euro">Daily Dynamite(EURO)</label>
                                <input type="text" name="daily_dynamite_euro" id="daily_dynamite_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_dynamite_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="daily_dynamite_pounds">Daily Dynamite(POUNDS)</label>
                                <input type="text" name="daily_dynamite_pounds" id="daily_dynamite_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_dynamite_pounds }}">
                            </div>

                            <div class="col-md-12 border-top mb-4 border-4"></div>


                            <div class="form-group col-md-3">
                                <label for="daily_fountain">Daily Fountain(NGN)</label>
                                <input type="text" name="daily_fountain" id="daily_fountain" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_fountain }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="daily_fountain_usd">Daily Fountain(USD)</label>
                                <input type="text" name="daily_fountain_usd" id="daily_fountain_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_fountain_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="daily_fountain_euro">Daily Fountain(EURO)</label>
                                <input type="text" name="daily_fountain_euro" id="daily_fountain_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_fountain_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="daily_fountain_pounds">Daily Fountain(POUNDS)</label>
                                <input type="text" name="daily_fountain_pounds" id="daily_fountain_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->daily_fountain_pounds }}">
                            </div>

                            <div class="col-md-12 border-top mb-4 border-4"></div>

                            <div class="form-group col-md-3">
                                <label for="bible_study">Bible Study(NGN)</label>
                                <input type="text" name="bible_study" id="bible_study" class="form-control" placeholder="Amount in figure" value="{{ $price->bible_study }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bible_study_usd">Bible Study(USD)</label>
                                <input type="text" name="bible_study_usd" id="bible_study_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->bible_study_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bible_study_euro">Bible Study(EURO)</label>
                                <input type="text" name="bible_study_euro" id="bible_study_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->bible_study_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bible_study_pounds">Bible Study(POUNDS)</label>
                                <input type="text" name="bible_study_pounds" id="bible_study_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->bible_study_pounds }}">
                            </div>

                            <div class="col-md-12 border-top mb-4 border-4"></div>

                            <div class="form-group col-md-3">
                                <label for="cyc">CYC(NGN)</label>
                                <input type="text" name="cyc" id="cyc" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cyc_usd">CYC(USD)</label>
                                <input type="text" name="cyc_usd" id="cyc_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cyc_euro">CYC(EURO)</label>
                                <input type="text" name="cyc_euro" id="cyc_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cyc_pounds">CYC(POUNDS)</label>
                                <input type="text" name="cyc_pounds" id="cyc_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_pounds }}">
                            </div>

                            <div class="col-md-12 border-top mb-4 border-4"></div>

                            <div class="form-group col-md-3">
                                <label for="cyc_calender">CYC Calendar(NGN)</label>
                                <input type="text" name="cyc_calender" id="cyc_calender" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_calender }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cyc_calender_usd">CYC Calendar(USD)</label>
                                <input type="text" name="cyc_calender_usd" id="cyc_calender_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_calender_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cyc_calender_euro">CYC Calendar(EURO)</label>
                                <input type="text" name="cyc_calender_euro" id="cyc_calender_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_calender_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cyc_calender_pounds">CYC Calendar(POUNDS)</label>
                                <input type="text" name="cyc_calender_pounds" id="cyc_calender_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->cyc_calender_pounds }}">
                            </div>

                            <div class="col-md-12 border-top mb-4 border-4"></div>

                            <div class="form-group col-md-3">
                                <label for="bcp">Bcp(NGN)</label>
                                <input type="text" name="bcp" id="bcp" class="form-control" placeholder="Amount in figure" value="{{ $price->bcp }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bcp_usd">Bcp(USD)</label>
                                <input type="text" name="bcp_usd" id="bcp_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->bcp_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bcp_euro">Bcp(EURO)</label>
                                <input type="text" name="bcp_euro" id="bcp_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->bcp_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bcp_pounds">Bcp(POUNDS)</label>
                                <input type="text" name="bcp_pounds" id="bcp_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->bcp_pounds }}">
                            </div>

                            <div class="col-md-12 border-top mb-4 border-4"></div>

                            <div class="form-group col-md-3">
                                <label for="hymnal">Hymnals(NGN)</label>
                                <input type="text" name="hymnal" id="hymnal" class="form-control" placeholder="Amount in figure" value="{{ $price->hymnal }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hymnal_usd">Hymnals(USD)</label>
                                <input type="text" name="hymnal_usd" id="hymnal_usd" class="form-control" placeholder="Amount in figure" value="{{ $price->hymnal_usd }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hymnal_euro">Hymnals(EURO)</label>
                                <input type="text" name="hymnal_euro" id="hymnal_euro" class="form-control" placeholder="Amount in figure" value="{{ $price->hymnal_euro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hymnal_pounds">Hymnals(POUNDS)</label>
                                <input type="text" name="hymnal_pounds" id="hymnal_pounds" class="form-control" placeholder="Amount in figure" value="{{ $price->hymnal_pounds }}">
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

        document.getElementById('daily_dynamite_usd').addEventListener('keypress', isNumber);
        document.getElementById('daily_fountain_usd').addEventListener('keypress', isNumber);
        document.getElementById('bible_study_usd').addEventListener('keypress', isNumber);
        document.getElementById('cyc_usd').addEventListener('keypress', isNumber);
        document.getElementById('cyc_calender_usd').addEventListener('keypress', isNumber);
        document.getElementById('bcp_usd').addEventListener('keypress', isNumber);
        document.getElementById('hymnal_usd').addEventListener('keypress', isNumber);

        document.getElementById('daily_dynamite_euro').addEventListener('keypress', isNumber);
        document.getElementById('daily_fountain_euro').addEventListener('keypress', isNumber);
        document.getElementById('bible_study_euro').addEventListener('keypress', isNumber);
        document.getElementById('cyc_euro').addEventListener('keypress', isNumber);
        document.getElementById('cyc_calender_euro').addEventListener('keypress', isNumber);
        document.getElementById('bcp_euro').addEventListener('keypress', isNumber);
        document.getElementById('hymnal_euro').addEventListener('keypress', isNumber);

        document.getElementById('daily_dynamite_pounds').addEventListener('keypress', isNumber);
        document.getElementById('daily_fountain_pounds').addEventListener('keypress', isNumber);
        document.getElementById('bible_study_pounds').addEventListener('keypress', isNumber);
        document.getElementById('cyc_pounds').addEventListener('keypress', isNumber);
        document.getElementById('cyc_calender_pounds').addEventListener('keypress', isNumber);
        document.getElementById('bcp_pounds').addEventListener('keypress', isNumber);
        document.getElementById('hymnal_pounds').addEventListener('keypress', isNumber);
    });
    </script>

@endsection
