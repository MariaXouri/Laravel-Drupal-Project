<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit the Event</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-5">
      
     <h1> Edit the Event </h1>
         <div class="container mt-5">
     <form action="{{ route('events.update', $event) }}" method="POST">
  @csrf
  @method('PUT')
       
   
            <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}">
            

            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="title" name="description" value="{{ old('description', $event->description) }}">

              <label for="space_id" class="form-label">Space </label>
              <select name="space_id" id="space_id" class="form-label" value="{{ old('space_id', $event->space_id) }}">
                 <!-- @foreach ($spaces as $sp)
                    <option value="{{$sp->id}}">{{$sp->name}}</option>
                @endforeach -->
              
              @foreach($spaces as $sp)
                <option value="{{ $sp->id }}"
                        @if(old('space_id', $event->space_id) == $sp->id) selected @endif>
                    {{ $sp->name }}
                </option>
                 @endforeach
            </select>

            <label for="start_date" class="form-label">Start Date</label>
            <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date) }}">

            <label for="end_date" class="form-label">End Date</label>
            <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date) }}">

  
            </div>
            <button class="btn btn-secondary btn-lg" type="submit">Save</button>
        <form>
             <div class="vh-10 d-flex flex-column justify-content-center align-items-center pb-5">
             <a href="{{ url('/events') }}" class="btn btn-primary btn-lg">Go to the Events page</a>
</div>
    </div>
        
    </div>
</body>
</html>