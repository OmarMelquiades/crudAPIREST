<?php

namespace App\Http\Controllers;
use App\Entities\ProveedorModel;
use App\Entities\Proveedor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    public function index(Request  $request){
        //$todos =ProveedorModel:: all();
        //echo $todos;

        //$ids =ProveedorModel::find(40);
        //echo $ids;

        //$max = ProveedorModel::max('idProveedor');
        //echo $max;

        $where = ProveedorModel::where('idProveedor', '<', 10)->limit(10)->get();
        echo $where;
    }
    **/
    public function index(Request  $request){
        //consulta a la base de datos
        $proveedores = ProveedorModel::select('*');
        $limit=(isset($request->limit)) ? $request->limit:10;
        
        //return DB::select('call Intento(?)',array(1));
        
        $Valores=DB::select('call Intento(?)',array(1));
        /* 
        foreach($Valores as $val){
        echo $val->correo ;
        }
         */

        if(isset($request->search)){
           $proveedores = $proveedores->where('razonSocial','like', '%'.$request->search.'%')
            ->orWhere('nombreCompleto','like', '%'.$request->search.'%')
            ->orWhere('direccion','like', '%'.$request->search.'%')
            ->orWhere('telefono','like', '%'.$request->search.'%')
            ->orWhere('correo','like', '%'.$request->search.'%')
            ->orWhere('rfc','like', '%'.$request->search.'%');
       }
       $proveedores = $proveedores->paginate($limit)->appends($request->all());
       return view('proveedores.index', compact('proveedores'),compact('Valores')) ;
    }

    public function create()
    {
        $num = ProveedorModel::all()->max('idProveedor');
        $numero = $num+1;
        return view('proveedores.create',compact('numero'));
    }

    public function store(Request $request){
        $proveedor = new ProveedorModel();
        $proveedor = $this->createUpdateProveedor($request,$proveedor);
        
        return redirect()
        ->route('proveedores.index')
        ->with('message','Se ha creado el registro correctamente...');
    }

    public function createUpdateProveedor(Request $request, $proveedor){
        $cuenta = ProveedorModel::max('idProveedor');
        $cuenta=$cuenta+1;
        
        $proveedor->razonSocial = $request->razonSocial;
        $proveedor->nombreCompleto = $request->nombreCompleto;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo	 = $request->correo	;
        $proveedor->rfc = $request->rfc;
        $proveedor->num = $cuenta;
        
        $proveedor->save();
        return $proveedor;
    }

    public function show($proveedor)
    {
        $proveedor = ProveedorModel::where('idProveedor', $proveedor)->firstOrFail();
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit($proveedor)
    {
        $proveedor = ProveedorModel::where('idProveedor', $proveedor)->firstOrFail();
        return view('proveedores.edit',compact('proveedor'));
    }

    public function update(Request $request, $proveedor)
    {
        $proveedor = ProveedorModel::where('idProveedor', $proveedor)->firstOrFail();
        $proveedor = $this->createUpdateProveedor($request,$proveedor);
        return redirect()
        ->route('proveedores.show', $proveedor)
        ->with('message','Se ha actualizado el registro correctamente...'); 
    }

    public function destroy($proveedor){
        $proveedor = ProveedorModel::findOrFail($proveedor);
        $proveedor->delete();
        return redirect()
        ->route('proveedores.index')
        ->with('message','Se ha eliminado el registro correctamente...'); 
    }


    public function exportPDF(){
        $proveedores = ProveedorModel::get();
        $pdf = Facade::loadView('proveedores.exportPDF',compact('proveedores'));


        //Descargar de forma directa
        //cambiar la orientacion
        $pdf ->setPaper('A4','landscape');
        return $pdf->download('proveedores.pdf');

        //Visualizar primero y luego descargar

        

        #return $pdf->stream();
    }
}