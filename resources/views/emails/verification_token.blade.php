<x-mail::message>

<img src="https://scontent.fabb1-1.fna.fbcdn.net/v/t1.6435-9/48363147_232705110957867_6286488230372048896_n.png?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeFpcxi_vfI53XupNw_aLMUVyRMn5d-usaHJEyfl366xoRA2xN584XXmV1cMVykMg1-WsEgn3Dbl_TAiKkdLEZW3&_nc_ohc=l8X3hQ-CvhoAX-BoAhx&_nc_ht=scontent.fabb1-1.fna&oh=00_AfCkG8gC6EFd-2WOXoLKtl4BgnWYRlfsz1wBmPxViAdY0w&oe=63C587FB" alt="logo" width="70" height="70">
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
