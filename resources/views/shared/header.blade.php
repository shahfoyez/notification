<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body >
<div>
    @include('components.navbar')
</div>
@include('components.validation')



<div id="app">
    <notification-component></notification-component>
</div>
{{--<script src="{{ mix('js/app.js') }}"></script>--}}




{{--<script src="{{ mix('js/app.js') }}"></script>--}}
@php
   $page = last(request()->segments());
@endphp
@if($page == 'admin55')
<audio id="notificationSound" preload="auto" allow="autoplay">
    <source src="{{ asset('/assets/audio/test.wav') }}" type="audio/mpeg">
</audio>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sendAjaxRequest() {
        $.ajax({
            url: '{{ url('/api/order/check') }}',
            method: 'GET',
            success: function (data) {
                if (data) {
                    // Show a SweetAlert2 popup
                    Swal.fire({
                        title: 'Notification',
                        text: 'The condition is true!',
                        icon: 'info'
                    });
                    const playButton = document.getElementById('playSoundButton');
                    // Get a reference to the audio element
                    const notificationSound = document.getElementById('notificationSound');
                    notificationSound.play();
                }
            }
        });
    }
    // Call the function initially
    sendAjaxRequest();

    // Set an interval to send the AJAX request every 10 seconds
    setInterval(sendAjaxRequest, 5000); // 10 seconds = 10,000 milliseconds
</script>
@endif
