<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
               <div class="vh-100 d-flex flex-column justify-content-center align-items-center pb-5">
                 <h1 class="mb-4">Event Management System</h1>
                 <a href="{{ url('/events') }}" class="btn btn-primary btn-lg">Go to the Events page</a>
              </div>

      </div>
    </body>
</html>
