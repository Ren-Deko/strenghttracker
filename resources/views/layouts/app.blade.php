<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('styles')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div class="container">
        @yield('content')  <!-- This is where your home.blade.php content should be rendered -->
    </div>











    
   <!-- Scripts -->








   <script src="{{ asset('js/app.js') }}"></script> <!-- Example: Including main app.js -->
   @yield('scripts')  <!-- This line is crucial to render page-specific scripts -->


