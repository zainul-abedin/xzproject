<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reunion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data['all_reunion_aujourdhui'] = $all_reunion_aujourdhui = Reunion::whereDate('start', '=', date('Y-m-d'))->orderBy('start', 'ASC')->get();
        
        $data['all_reunion_futures'] = $all_reunion_futures = Reunion::whereDate('start','>', date('Y-m-d'))->orderBy('start', 'ASC')->get();
        
        $data['all_reunion_pas_terminee'] = $all_reunion_pas_terminee = Reunion::whereDate('end','<', date('Y-m-d'))->where('statut', '=', 0)->orderBy('start', 'ASC')->get();
        
        $data['all_reunion_terminee'] = $all_reunion_terminee = Reunion::whereDate('end','<', date('Y-m-d'))->where('statut', '=', 1)->orderBy('start', 'ASC')->get();
                
        return view('home',$data);
    }
}
