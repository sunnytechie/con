<x-mail::message>

<img src="https://api.conaio.com/assets/img/Untitled_design__20_-removebg-preview.png" alt="logo" width="70" height="70">
<hr style="margin: 15px 0">

<p>Hi there!</p>
<p>Welcome to the Anglican church of Nigeria Mobile Application. <br>
    Kindly, enter the following OTP to verify your account:</p>

<div style="margin: 35px 0;">
    <span style="background: #E7F3FF; color: #000; border: 0.1rem solid rgb(28, 28, 186); border-radius: 6px; padding: 12px; font-size: 16px; font-weight: 400; cursor:default">{{ $compose['token'] }}</span>
</div>
<p>Thank you for using our application.</p>

{{ config('app.name') }}
</x-mail::message>
