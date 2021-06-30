<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendars;
use DB; 


class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        return view('backend.calendario');
    }

    public function calendarEvents(Request $request)
    {
       $eventos = Calendars::get();

       return ['eventos' => $eventos];
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $evento                = new Calendars;
            $evento->title         = $request->title;
            $evento->start         = $request->start;
            $evento->end           = $request->end;
            $evento->allDay        = $request->allDay;
            $evento->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
   
    public function ruta(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        if ($request) {             
            $ruta = $request->root();
            return ['ruta' => $ruta];
        }
    }

}
