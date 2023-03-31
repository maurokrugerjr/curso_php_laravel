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

        $evento = new Event;

        $evento->title = $request->title;
        $evento->description = $request->description;
        $evento->city = $request->city;
        $evento->private = $request->private;


        

        $evento->save();

        return redirect('bemvindo')->with('msg', 'Evento criado com sucesso!');
    }
}
