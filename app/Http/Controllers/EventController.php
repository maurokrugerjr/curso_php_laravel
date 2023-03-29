<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{
    public function index() {

        $events = Event::all();
    
        return view('bemvindo.welcome', ['events' => $events]);

    }

    public function create(){

        return view('events.create');

    }

    public function contact(){

        return view('contatos.contact');

    }

    public function store(Request $request){

        $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;

        $event->save();

        return redirect('bemvindo');
    }
}
