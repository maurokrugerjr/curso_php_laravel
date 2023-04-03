<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;


class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if ($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }
    
        return view('bemvindo.welcome', ['events' => $events, 'search' => $search]);

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
        $evento->items = $request->items;
        $evento->date = $request->date;

        if ($request->hasfile('image') && $request->file('image')->isvalid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $evento->image = $imageName;

        }
        
        $user = auth()->user();
        $evento->user_id = $user->id;


        $evento->save();

        return redirect('/bemvindo')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){

        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view ('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }
}
