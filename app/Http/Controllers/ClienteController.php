<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\ClienteModel;
use Barryvdh\DomPDF\Facade;

class ClienteController extends Controller{

    public function index(Request  $request){
    
        $clientes = ClienteModel::select('*');
        $limit=(isset($request->limit)) ? $request->limit:10;
        
       if(isset($request->search)){
           $clientes = $clientes->where('nombre','like', '%'.$request->search.'%')
            ->orWhere('apellidoPaterno','like', '%'.$request->search.'%')
            ->orWhere('apellidoMaterno','like', '%'.$request->search.'%')
            ->orWhere('rfc','like', '%'.$request->search.'%')
            ->orWhere('telefono','like', '%'.$request->search.'%')
            ->orWhere('correo','like', '%'.$request->search.'%')
            ->orWhere('direccion','like', '%'.$request->search.'%');
       }

       $clientes = $clientes->paginate($limit)->appends($request->all());

       return view('clientes.index', compact('clientes')) ;
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        $clientes = new ClienteModel();
        $clientes = $this->createUpdateCliente($request,$clientes);
        
        return redirect()
        ->route('clientes.index')
        ->with('message','Se ha creado el registro correctamente...');
    }

    public function createUpdateCliente(Request $request, $cliente){ 
        $cliente->nombre = $request->nombre;
        $cliente->apellidoPaterno = $request->apellidoPaterno;
        $cliente->apellidoMaterno = $request->apellidoMaterno;
        $cliente->rfc = $request->rfc;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->idProducto = $request->idProducto;
               
        $cliente->save();
        return $cliente;
    }

    public function show($clientes){
        $clientes = ClienteModel::where('idCliente', $clientes)->firstOrFail();
        return view('clientes.show', compact('clientes'));
    }

    public function edit($cliente) {
        $cliente = ClienteModel::where('idCliente', $cliente)->firstOrFail();
        return view('clientes.edit',compact('cliente'));
    }


    public function update(Request $request, $cliente){
        $cliente = ClienteModel::where('idCliente', $cliente)->firstOrFail();
        $cliente = $this->createUpdateCliente($request,$cliente);
        return redirect()
        ->route('clientes.show', $cliente)
        ->with('message','Se ha actualizado el registro correctamente...'); 
    }

    public function destroy($cliente){
        $cliente = ClienteModel::findOrFail($cliente);
        $cliente->delete();
        return redirect()
        ->route('clientes.index')
        ->with('message','Se ha eliminado el registro correctamente...'); 
    }

    public function exportPDF(){
        $Clientes = ClienteModel::get();
        $pdf = Facade::loadView('clientes.exportPDF',compact('Clientes'));
        return $pdf->download('Clientes.pdf');
    }
}
