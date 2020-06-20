<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\User;
use App\Registro;
use App\Sala;

use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $sensores = Sensor::all();
        if($user->rol_id == 1){
            $salas = Sala::all();
        } else {
            $salas = Sala::where('empresa_id','=', $user->empresa_id)->get();
        }
        return view('home', compact('salas', 'sensores'));

    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $id = $request['id'];
        $sensores = Sensor::where('sala_id','=', $id)->get();
        
        $sala = Sala::find($id);
        
        $fechaInicio=$request['inicio']; 
        if($fechaInicio==null){
            //23/05/2019
            $finicio = date("d/m/Y");
            $fechaInicio =  date("Y-m-d 00:00:00");
        } else{
            $finicio =  $request['inicio'];
            $fi = explode("/", $request['inicio']);
            $fechaInicio =  $fi[2]."-".$fi[1]."-".$fi[0]." 00:00:00";
        }
        $fechaFinal=$request['fin']; 
        if($fechaFinal==null){
            $fifin = date("d/m/Y");
            $fechaFinal = date("Y-m-d 23:23:00");
        } else {
            $fifin = $request['fin'];
            $ff = explode("/", $request['fin']);
            $fechaFinal = $ff[2]."-".$ff[1]."-".$ff[0]." 23:59:59";
        }
        $registros = Registro::whereBetween('created_at',[$fechaInicio,$fechaFinal])->get();
        
        $registros_count = count($registros);
        $total = $registros_count - 50;
        $registros_grafica = Registro::whereBetween('created_at',[$fechaInicio,$fechaFinal])->offset($total)->limit(50)->get();
        

        return view('detalles', compact('registros', 'registros_grafica', 'sensores','sala','finicio', 'fifin'));
        
    }
}
