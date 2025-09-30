<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-5">
      
     <h1> The events are</h1>

     <div class="row justify-content-center">
        <div class="col-md-6 ">
         <div class="vh-110 d-flex flex-column justify-content-center align-items-center pb-5" >   
            <ul class="list-unstyled text-center">
            @foreach($events as $event)
            <li class="text-center mb-3" style="strong">{{ $event->title }}
                 <a href="{{ URL('/showEvent',$event->id) }}" class= "btn btn-primary btn-sm">Show details</a>
                <a href="{{ URL('/updateEvent',$event->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ url('/deleteEvent/'.$event->id) }}" method="POST" style="display:inline;"
                   onsubmit="return confirm('Do you want to delete this?')">
                   @csrf 
                   @method('DELETE')
                   <button type="submit" class= "btn btn-danger btn-sm"> Delete </button>
                   
                </form>
                <hr>
            </li>
            @endforeach
        </ul>
   <a href="{{ url('/createEvent') }}" class="btn btn-success btn-lg">Create an event</a>
</div>
</div>
    </div>
    </div>
</body>
</html>