<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entities\ProductoModel;
use Barryvdh\DomPDF\Facade;


class ProductosController extends Controller{
    
    public function index(Request  $request){
    
        $productos = ProductoModel::select('*');
        $limit=(isset($request->limit)) ? $request->limit:10;
        
       if(isset($request->search)){
           $productos = $productos->where('nombre','like', '%'.$request->search.'%')
            ->orWhere('apellidoPaterno','like', '%'.$request->search.'%')
            ->orWhere('apellidoMaterno','like', '%'.$request->search.'%')
            ->orWhere('rfc','like', '%'.$request->search.'%')
            ->orWhere('telefono','like', '%'.$request->search.'%')
            ->orWhere('correo','like', '%'.$request->search.'%')
            ->orWhere('direccion','like', '%'.$request->search.'%');
       }

       $productos = $productos->paginate($limit)->appends($request->all());

       return view('productos.index', compact('productos')) ;
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        $productos = new ProductoModel();
        $productos = $this->createUpdateProducto($request,$productos);
        
        return redirect()
        ->route('productos.index')
        ->with('message','Se ha creado el registro correctamente...');
    }

    public function createUpdateProducto(Request $request, $productos){ 
        $productos->nombre = $request->nombre;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->expiracion = $request->expiracion;
        $productos->stock = $request->stock;
        $productos->idProveedor = $request->idProveedor;
                       
        $productos->save();
        return $productos;
    }

    public function show($productos){
        $productos = ProductoModel::where('idProducto', $productos)->firstOrFail();
        return view('productos.show', compact('productos'));
    }

    public function edit($productos) {
        $productos = ProductoModel::where('idProducto', $productos)->firstOrFail();
        return view('productos.edit',compact('productos'));
    }


    public function update(Request $request, $productos){
        $productos = ProductoModel::where('idProducto', $productos)->firstOrFail();
        $productos = $this->createUpdateProducto($request,$productos);
        return redirect()
        ->route('productos.show', $productos)
        ->with('message','Se ha actualizado el registro correctamente...'); 
    }

    public function destroy($productos){
        $productos = ProductoModel::findOrFail($productos);
        $productos->delete();
        return redirect()
        ->route('productos.index')
        ->with('message','Se ha eliminado el registro correctamente...'); 
    }
    
    public function exportPDF(){
        $productos = ProductoModel::get();
        $pdf = Facade::loadView('productos.exportPDF',compact('productos'));
        return $pdf->download('productos.pdf');
    }
}
