<?php
namespace App\Http\Controllers;
use App\Empresa;
use App\Sala;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSala;
use App\Http\Requests\UpdateSalaPut;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
 

class SalasController extends Controller
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
        $salas = Sala::orderBy('created_at', 'desc')->paginate(100);
        return view('dashboard.salas.index', ['salas' => $salas]);
        //
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = Empresa::pluck('id', 'nombre');
        $sala = new Sala();
        return view('dashboard.salas.create', compact('empresa', 'sala'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSala $request)
    {
        //
        $requestData = $request->validated();
        Sala::create($requestData);
        return back()->with('status', 'Sala creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        return view('dashboard.salas.show', ["sala" => $sala]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        $empresa = Empresa::pluck('id', 'nombre');
        return view('dashboard.salas.edit', compact('sala', 'empresa'));

        // return view('dashboard.sensors.edit', ['sensor'=> $sensor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalaPut $request, Sala $sala)
    {
        //dd($request);
        $sala->update($request->validated());
        return back()->with('status', 'Sala actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala)
    {
        $sala->delete();
        return back()->with('status', 'Sala eliminado con exito');
    }
}
