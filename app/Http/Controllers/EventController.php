<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

use PDF;

class EventController extends Controller
{
    public function index($id)
    {
        $events= Event::where('ruang_id', $id)->get();
        $event= [];
        
        foreach($events as $row){
            // $enddate = $row->end_date."24:00:00";
            \Calendar::setOptions([
                'defaultView'=> 'agendaDay',
            ]);
            $event[] = \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                    'pic' => $row->pic,
                ],
                $row->pic
            );
        }
        
        $ruang = \App\Ruang::where('id', $id)->first();

        $calendar = \Calendar::addEvents($event, [])->setCallbacks([
            'eventClick' => 'function(event) {
                alert(event.title + " - " + event.pic);
            }'
        ]);
        return view('eventpage', compact('events','calendar', 'id', 'ruang'));
    }

    public function display($id){
        return view ('addevent', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $ruang_id = $request->get('ruang_id');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $start_date = $request->input('start_date').' '.$start_time;
        $end_date = $request->input('end_date').' '.$end_time;

        $cekStart = Event::whereBetween('start_date', [$start_date, $end_date])->first();
        $cekEnd = Event::whereBetween('end_date', [$start_date, $end_date])->first();

        // dd($cekEnd);

        if(!empty($cekStart) || !empty($cekEnd)) {
            return redirect()->route('events', $ruang_id)->with('fail','Ruangan sudah dipakai.');
        } else {

            $event = new Event;

            $event->title = $request->input('title');
            $event->ruang_id = $ruang_id;
            $event->pic = $request->input('pic');
            $event->color = $request->input('color');
            $event->start_date = $start_date;
            $event->end_date = $end_date;
                
            $event->save();
            // dd($event);
            return redirect()->route('events', $ruang_id)->with('success','Events Added');
        }
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
        $start_time_new = $request->input('start_time_new');
        $end_time_new = $request->input('end_time_new');
        $start_date_new = $request->input('start_date_new').' '.$start_time_new;
        $end_date_new = $request->input('start_date_new').' '.$end_time_new;

        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->pic = $request->input('pic');
        $events->ruang_id = $ruang_id;
        if($start_date_new){
            $events->start_date = $start_date_new;
        } else {
            $events->start_date = $request->get('start_date');
        }
        if($end_date_new){
            $events->end_date = $end_date_new;
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

    public function addGedung()
    {
        return view('gedung.addGedung');
    }

    public function addGedungSave(Request $request)
    {
        $gedung = new \App\Building;
        $gedung->building_name = $request->get('nama_building');
        $gedung->save();

        return redirect()->route('home')->with('status', 'Berhasil menambahkan Gedung');
    }

    public function editGedung($id)
    {
        $gedung = \App\Building::find($id);

        return view('gedung.editGedung', ['gedung' => $gedung]);
    }

    public function editGedungSave(Request $request)
    {
        $gedung = \App\Building::where('id', $request->get('id'))->first();

        $gedung->building_name = $request->get('nama_building');

        $gedung->save();

        return redirect()->route('home')->with('status', 'Berhasil mengedit Gedung');
    }

    public function deleteGedung($id)
    {
        $gedung = \App\Building::find($id);

        $gedung->delete();

        return redirect()->route('home')->with('status', 'Berhasil menghapus Gedung');
    }

    public function detailGedung($id)
    {
        $floor = \App\Floor::where('building_id', $id)->get();

        return view('lantai.index', ['floors' => $floor, 'id' => $id]);
    }

    public function addLantai($id)
    {
        return view('lantai.addLantai', ['id' => $id]);
    }

    public function addLantaiSave(Request $request)
    {
        $id = $request->get('id');

        $floor = new \App\Floor;
        $floor->building_id = $id;
        $floor->floor_name = $request->get('floor_name');
        $floor->save();

        return redirect()->route('detailGedung', ['id' => $id])->with('status', 'Berhasil menambah Lantai');
    }

    public function editLantai($id)
    {
        $floor = \App\Floor::find($id);

        return view('lantai.editLantai', ['floor' => $floor]);
    }

    public function editLantaiSave(Request $request)
    {
        $floor = \App\Floor::where('id', $request->get('id'))->first();

        $floor->floor_name = $request->get('floor_name');

        $floor->save();

        return redirect()->route('detailGedung', ['id' => $floor->building_id])->with('status', 'Berhasil mengubah Lantai');
    }

    public function deleteLantai($id)
    {
        $floor = \App\Floor::where('id', $id)->first();
        
        $id = $floor->building_id;

        $floor->delete();

        return redirect()->route('detailGedung', ['id' => $id])->with('status', 'Berhasil menghapus Lantai');
    }

    public function detailLantai($id)
    {
        $ruang = \App\Ruang::where('floor_id', $id)->get();

        return view('ruang.index', ['ruangs' => $ruang, 'id' => $id]);
    }

    public function addRuang($id)
    {
        return view('ruang.addRuang', ['id' => $id]);
    }

    public function addRuangSave(Request $request)
    {
        $id = $request->get('id');

        $ruang = new \App\Ruang;
        $ruang->floor_id = $id;
        $ruang->ruang_name = $request->get('nama_ruang');
        $ruang->save();

        return redirect()->route('detailLantai', ['id' => $id])->with('status', 'Berhasil menambah Ruangan');
    }

    public function editRuang($id)
    {
        $ruang = \App\Ruang::find($id);

        return view('ruang.editRuang', ['ruang' => $ruang]);
    }

    public function editRuangSave(Request $request)
    {
        $ruang = \App\Ruang::where('id', $request->get('id'))->first();

        $ruang->ruang_name = $request->get('ruang_name');

        $ruang->save();

        return redirect()->route('detailLantai', ['id' => $ruang->floor_id])->with('status', 'Berhasil mengubah Ruangan');
    }

    public function deleteRuang($id)
    {
        $ruang = \App\Ruang::where('id', $id)->first();

        $id = $ruang->floor_id;

        $ruang->delete();

        return redirect()->route('detailLantai', ['id' => $id])->with('status', 'Berhasil menghapus Ruangan');
    }

    public function qrcode($id)
    {

        $pdf = PDF::loadView('qrcode', ['id' => $id]);

        // return $pdf->download('data-ruang.pdf');

        return view('qrcode', ['id' => $id]);
    }
}
