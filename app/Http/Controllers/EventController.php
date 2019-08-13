<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index($id)
    {
        $events= Event::where('ruang_id', $id)->get();
        $event= [];
        
        foreach($events as $row){
            // $enddate = $row->end_date."24:00:00";
            $event[] = \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
                );
        }
        // return view('eventpage');
        $calendar = \Calendar::addEvents($event);
        return view('eventpage', compact('events','calendar', 'id'));
        // dd($calendar);
        // return view('eventpage');
    }

    public function display($id){
        return view ('addevent', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $ruang_id = $request->get('ruang_id');

        $this->validate($request,[
            'ruang_id' => 'required',
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $event = new Event;

        $event->title = $request->input('title');
        $event->ruang_id = $ruang_id;
        $event->color = $request->input('color');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
            
        $event->save();
        // dd($event);
        return redirect()->route('events', $ruang_id)->with('success','Events Added');

    }

    public function show()
    {
        $events = Event::all();
        return view('display')->with('events',$events);
    }

    public function edit($id)
    {
        $events = Event::find($id);
        return view('editform',compact('events','id'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $ruang_id = $request->get('ruang_id');
        $events = Event::find($id);

        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->ruang_id = $ruang_id;
        if($request->input('start_date_new')){
            $events->start_date = $request->input('start_date_new');
        } else {
            $events->start_date = $request->get('start_date');
        }
        if($request->input('end_date_new')){
            $events->end_date = $request->input('end_date_new');
        } else {
            $events->end_date = $request->get('end_date');
        }
        
        $events->save();
        return redirect()->route('events', $ruang_id)->with('success','Data Update');
    }

    public function destroy($id)
    {
        $events = Event::find($id);
        $ruang_id = $events->ruang_id;
        $events->delete();

        return redirect()->route('events', $ruang_id)->with('success, data deleted');
    }
}
