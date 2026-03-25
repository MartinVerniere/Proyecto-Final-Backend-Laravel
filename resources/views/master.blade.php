<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/master.css'])
        @yield('css')
        <title>Proyecto Final</title>
    </head>
    <body class="body">
        <div class="main">
			<div class="alert-container">
				@include('alert')
			</div>
			
            <div class ="main-navbar">
                @include('navbar')    
            </div>

            <div class="main-content">
                @yield('content')
            </div>
        </div>
        @yield('scripts')
    </body>
</html>