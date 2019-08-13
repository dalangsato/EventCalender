<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events= Event::all();
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
        return view('eventpage', compact('events','calendar'));
        // dd($calendar);
        // return view('eventpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display(){
        return view ('addevent');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $event = new Event;

        $event->title = $request->input('title');
        $event->color = $request->input('color');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
            
        $event->save();
        // dd($event);
        return redirect('events')->with('success','Events Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $events = Event::all();
        return view('display')->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id);
        return view('editform',compact('events','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $this->validate($request,[
         'title'=>'required',
         'color'=> 'required',
         'start_date'=> 'required',
         'end_date'=> 'required',
     ]);
     $events = Event::find($id);

     $events->title = $request->input('title');
     $events->color = $request->input('color');
     $events->start_date = $request->input('start_date');
     $events->end_date = $request->input('end_date');

     $events->save();
     return redirect('events')->with('success','Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);
        $events->delete();

        return redirect('events')->with('success, data deleted');
    }
}
