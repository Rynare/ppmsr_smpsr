<!DOCTYPE html>
<html lang="en">

<head data-bs-theme="dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/smpsr-icon.svg') }}" type="image/x-icon">
    <title>{{ $pageTitle }}</title>
    <style>
        :root {
            ---root-color-red: #760712;
            ---root-color-brown: #e0cc8d;
        }
    </style>
    @yield('html-start')
</head>

<body>
    @stack('modal-container')
    @yield('custom')
    @yield('header')
    @yield('content')
    @yield('footer')
    @yield('html-end')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @stack('DOM_Loaded')
        })
    </script>
</body>

</html>
