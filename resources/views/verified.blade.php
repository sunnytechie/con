<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONAIO</title>
    {{-- favicon --}}
    <link rel="icon" href="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verified.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5 shadow">
                    <div class="card-header">
                        <h3 class="text-center">
                            <img height="80" width="80" src="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}" alt="">
                        </h3>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Your email has been verified successfully</h5>
                        <p class="card-text">You can now login to the mobile application.</p>
                        <button onclick="self.close()" class="btn btn-default shadow-sm btn-lg">Done</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>