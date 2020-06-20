<?php
namespace App\Http\Controllers;
use App\Empresa;
use App\User;
use App\Sensor;



use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpresa;
use App\Http\Requests\UpdateEmpresaPut;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

 
class EmpresasController extends Controller
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
        $empresas = Empresa::orderBy('created_at', 'desc')->paginate(100);
        return view('dashboard.empresas.index', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.empresas.create', ['empresas' => new Empresa()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpresa $request)
    {


        $file = $request->file('logo_u');

        if(!isset($file)){
            $logo = NULL;
        } else {
            $logo = $request->file('logo_u')->store('public');
        }

        
        Empresa::create(
            [
                'nombre' => $request['nombre'],
                'logo' => $logo,
            ]
        );
        
        // $requestData = $request->validated();
        // Empresa::create($requestData);
        return back()->with('status', 'Empresa creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('dashboard.empresas.show', ["empresas" => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('dashboard.empresas.edit', ["empresas" => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpresaPut $request, Empresa $empresa)
    {


        $file = $request->file('logo_u');

        if(!isset($file)){
            $logo = $request['logo'];
        } else {
            $logo = $request->file('logo_u')->store('public');
        }

        
        $empresa->update(
            [
                'nombre' => $request['nombre'],
                'logo' => $logo,
            ]
        );
        
        //$empresa->update($request->validated());
        return back()->with('status', 'Empresa actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $count = User::where('empresa_id','=',$empresa->id)->count();
        $count2 = Sensor::where('empresa_id','=',$empresa->id)->count();

        if($count==0 && $count2 ==0){
            $empresa->delete();
            return back()->with('status', 'Empresa eliminado con exito');    
        } else {
            return back()->with('status-danger', 'No se pudo eliminar porque esta asociada a usuarios o sensores');    
        }
    }
}
