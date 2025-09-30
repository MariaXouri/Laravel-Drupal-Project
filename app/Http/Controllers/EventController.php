<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Space;

class EventController extends Controller
{
    public function api_index(){
        
        $events = Event::all();
        
        return response()->json(['events' => $events]);


    }

     public function index(){
        
        $events = Event::all();
        
        return view('event.index', compact('events'));
        
       
    }


    public function upcoming(){
        $upcoming_events = Event::where('start_date', '>', now())->orderBy('start_date')->get();
        return response()->json(['upcoming_events' => $upcoming_events]);
    }

    public function create(){
         $spaces = Space::all();
         return view('event.create',compact('spaces')); 
    }


    public function store(Request $request){
        // dd($request->all());

    //validation
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'space_id' => 'required|exists:spaces,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    //input
       $event = new Event;
       $event->title = $request->input('title');
       $event->description = $request->input('description');
       $event->start_date = $request->input('start_date');
       $event->end_date = $request->input('end_date');
       $event->space_id = $request->input('space_id');

       $event->save();


   

        if ($request->wantsJson()) {
        return response()->json(['event' => $event], 201);
        }
        return redirect('/events')->with('success','The event was created!');


    }
     public function edit(Event $event){

        // $event = Event::findOrFail($id);
        $spaces = Space::all();

        return view('event.update', compact('event','spaces'));
    }

     public function update(Request $request, Event $event){
        // dd($request->all());

    //validation
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'space_id' => 'required|exists:spaces,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

   
        // $event = Event::findOrFail($id);

       $event->title = $request->input('title');
       $event->description = $request->input('description');
       $event->start_date = $request->input('start_date');
       $event->end_date = $request->input('end_date');
       $event->space_id = $request->input('space_id');

       $event->save();


         return redirect('/events')->with('success', 'The event was updated!');

    

    }

     public function show(Event $event){

        // $event = Event::findOrFail($id);
        $spaces = Space::all();

        return view('event.show', compact('event','spaces'));
    }
     
     public function delete(Request $request, Event $event){

      
        $event->delete();

        return redirect('/events');
    }
     


}
