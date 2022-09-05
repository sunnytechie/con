<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @media screen and (max-width: 640px) {
            .spacer {
                display: none;
            }
        }
        .msg p {
            font-size: 13px;
            line-height: 18px;
        }

        .msg {
            min-height: 40vh !important;
        }

        .container {
                margin: 0 auto; background: #fff;
                width: 100%;
            }

        @media screen and (min-width: 640px) {
            .container {
                width: 640px !important;
                margin: 0 auto; background: #fff
            }
        }
    </style>
</head>
<body style="background: #E3E3E3">
    <div class="spacer" style="height: 20px"></div>

    {{-- Logo --}}
    <div style="text-align: center; margin: 6px auto;">
        <img height="45" width="45" src="https://api.conaio.com/assets/img/Untitled_design__20_-removebg-preview.png" alt="CONAIO">
    </div>
    {{-- //ENd Logo --}}

    <div class="container">
        
        <div class="msg" style="padding: 15px 18px; font-size: 14px;">
            <p>Beloved {{ $compose['username'] }},</p>
            {!! $compose['message'] !!}
        </div>

        <footer style="background: #f8eaea; padding: 20px 0;">
            <div style="padding: 5px 20px">
                <span style="font-size: 12px; color: rgb(139, 138, 138);">Anglican Church of Nigeria</span>
            </div>

            <div style="padding: 5px 20px">
                <span style="font-size: 12px; color: rgb(139, 138, 138);">© CONAIO. All rights reserved.</span>
            </div>
        </footer>

    </div>
    <div class="spacer" style="height: 20px"></div>
</body>
</html>