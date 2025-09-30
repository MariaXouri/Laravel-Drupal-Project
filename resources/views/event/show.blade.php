<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event's details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-5 align-items-center">
      
     <h1> Event's details </h1>
         <div class="container mt-5">
       <form action="{{ url('/showEvent/'.$event) }}" method="GET">
    @csrf
    @method('GET')
        
       
            <div class="mb-3">

                <h2>Title: {{$event->title}} </h2>
                <h2>Description: {{$event->description}} </h2>
                <h2>Start Date: {{$event->start_date}} </h2>
                <h2>End Date: {{$event->end_date}} </h2>
                <h2>Space: {{$event->space->name}},  {{$event->space->address}}, 
                    {{$event->space->city}}, {{$event->space->zip_code}} </h2>
               
  
            </div>
        <form>
             <div class="vh-10 d-flex flex-column justify-content-center align-items-center pb-5">
             <a href="{{ url('/events') }}" class="btn btn-primary btn-lg">Go to the Events page</a>
</div>
    </div>
    </div>
</body>
</html>