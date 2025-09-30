<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-5">
        <form action="/createEvent" method="POST">
        {{csrf_field()}}
        @method('POST')
     <h1> Create an event:</h1> 
            <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">

            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="title" name="description">

              <label for="space_id" class="form-label">Space </label>
              <select name="space_id" id="space_id" class="form-label">
                @foreach ($spaces as $sp)
                    <option value="{{$sp->id}}">{{$sp->name}}</option>
                @endforeach
            </select>

            <label for="start_date" class="form-label">Start Date</label>
            <input type="datetime-local" class="form-control" id="start_date" name="start_date">

            <label for="end_date" class="form-label">End Date</label>
            <input type="datetime-local" class="form-control" id="end_date" name="end_date">

            </div>
            <button  class="btn btn-secondary btn-lg" type="submit">Save</button>
        <form>
          <div class="vh-10 d-flex flex-column justify-content-center align-items-center pb-5">
             <a href="{{ url('/events') }}" class="btn btn-primary btn-lg">Go to the Events page</a>
</div>
    </div>
    
</body>
</html>


