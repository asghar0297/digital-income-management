<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PrayerController extends Controller
{
    private $prayer_status;
    private $prayers;

    function __construct(){
        $this->prayer_status = ['not_prayed' => 'Not Prayed', 'late' => 'Late', 'on_time' => 'On Time', 'with_jamaah' =>'With Jamaah'];
        $this->prayers = ['fajr' => 'Fajr', 'dhuhr' => 'Dhuhr', 'asr' => 'Asr', 'maghrib' =>'Maghrib', 'isha' => 'Isha'];
    }

    function index(){
        return view('prayer.index');
    }
    
    function create(){
        $prayer_status = $this->prayer_status;
        $prayers = $this->prayers;
        $model = new Prayer;
        return view('prayer.create', compact('model', 'prayer_status', 'prayers'));
    }

    function store(Request $request){
        
        // $this->validate($request,Meeting::rules(),[],Meeting::attributes());
        $prayer = $request->prayer;
        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        

        Prayer::updateOrCreate(
            ['date' => $date, 'prayer' => $request->prayer],
            ['prayer_status' => $request->prayer_status]
        );

        session()->flash('success','Data Add Sucessfully');
        return redirect()->route('prayer-management.index');
    }
}
