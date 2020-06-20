<?php
namespace App\Http\Controllers;
use App\Sensor;
use App\Sala;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSensor;
use App\Http\Requests\UpdateSensorPut;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
 

class SensoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);

    }

    public function index()
    {
        $sensores = Sensor::orderBy('created_at', 'desc')->paginate(100);
        return view('dashboard.sensors.index', ['sensors' => $sensores]);
        //
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::pluck('id', 'nombre');
        $sensor = new Sensor();
        return view('dashboard.sensors.create', compact('sensor', 'salas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSensor $request)
    {
        //
        $requestData = $request->validated();
        Sensor::create($requestData);
        return back()->with('status', 'Sensor creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        return view('dashboard.sensors.show', ["sensor" => $sensor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        $salas = Sala::pluck('id', 'nombre',' empresa_id');
        return view('dashboard.sensors.edit', compact('sensor', 'salas'));

        // return view('dashboard.sensors.edit', ['sensor'=> $sensor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSensorPut $request, Sensor $sensor)
    {
        //dd($request);
        $sensor->update($request->validated());
        return back()->with('status', 'Sensor actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        $sensor->delete();
        return back()->with('status', 'Sensor eliminado con exito');
    }
}
