<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* Reset some default styling */
        body, p {
            margin: 0;
            padding: 0;
        }

        /* Set a background color */
        body {
            background-color: #f5f5f5;
        }

        /* Center the email content */
        .email-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            /*box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);  Box shadow added */
        }

        /* Responsive styles for mobile */
        @media screen and (max-width: 600px) {
            .email-container {
                max-width: 100%;
                padding: 10px;
            }
        }

        #header {
        text-align: center;
        padding: 20px 0;
        margin-top: 10px;
        margin-bottom: 30px;
      }

      #header img {
        max-width: 100%;
        height: auto;
      }
    </style>
</head>
<body>
    <div class="email-container">
        <a href="https://conaio.com" style="text-decoration: none; margin-bottom: 20px">
            <div class="email-header" style="color: #4C0B93; font-weight: 700; font-size: 25px; padding: 25px 0;">
                CONAIO
            </div>
        </a>

        <div id="content">
            <div class="text-1">Welcome to Conaio</div>
                <div class="text-3">
                    Please use the login details to login to Conaio.
                </div>
            <div class="text-2" style="margin-bottom: 15px; margin-top: 15px; color: #4C0B93; font-size: 20px; font-weight: 700">{{ $compose['email'] }}</div>
            <div class="text-2" style="margin-bottom: 15px; margin-top: 15px; color: #4C0B93; font-size: 20px; font-weight: 700">{{ $compose['password'] }}</div>



            <div class="text-3">
              You're getting this email because {{ $compose['name'] }} added you to our membership forum.
            </div>
        </div>

        <div style="margin-top: 15px"></div>
        <p>Sincerely,</p>
        <p>Conaio</p>
    </div>

    <div style="max-width: 500px; margin: 30px auto; background-color: transparent;">
        <div style="border-top: 1px solid #999; margin-top: 20px; margin-bottom: 5px"></div>
        <p style="margin-top: 20px; color: #999999; font-size: 12px; padding: 0 10px 8px; 15px">&copy; {{ date('Y') }} CONAIO, All rights reserved.</p>
        {{-- <p style="color: #999999; font-size: 12px;">Office address</p> --}}
        <div style="color: #999999; padding: 0 10px 20px; 15px">
            <a style="margin-right: 5px; text-decoration: none; color: #999999; font-size: 12px;" href="#">About us</a>
            <a style="margin-right: 5px; text-decoration: none; color: #999999; font-size: 12px;" href="#">Privacy Policy</a>
            <a style="margin-right: 5px; text-decoration: none; color: #999999; font-size: 12px;" href="#">Terms and Conditions</a>
        </div>
    </div>
</body>
</html>
