<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;


use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query("page",1);
        $limit = $request->query("limit",6);
        $order=$request->query("order","ASC");
        try {
            $counVtehiculos = Vehiculo::count();
            $vehiculos = Vehiculo::with('usuario','modelo','color','dueno')
                ->offset(($page-1)*$limit)
                ->orderBy("idvehiculo",$order)
                ->limit($limit)
                ->get();
            return response()->json(["data"=>$vehiculos,"vehiculosTotales"=>$counVtehiculos,"msg"=>"ok","status"=>200],200);
        } catch (\Throwable $th) {
            return response()->json(["error"=>$th,"msg"=>"false","status"=>500],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehiculo $vehiculo)
    {   
        
        $fechaRegistro = Carbon::now('UTC');
        try {
            $vehiculoCreate = new Vehiculo();
            $vehiculoCreate->idusuario = $request->input("vehiculo.idusuario");
            $vehiculoCreate->idmodelo = $request->input("vehiculo.idmodelo");
            $vehiculoCreate->iddueno = $request->input("vehiculo.iddueno");
            $vehiculoCreate->idcolor = $request->input("vehiculo.idcolor");
            $vehiculoCreate->tipo = $request->input("vehiculo.tipo");
            $vehiculoCreate->ano = $request->input("vehiculo.ano");
            $vehiculoCreate->cc = $request->input("vehiculo.cc");
            $vehiculoCreate->kilometros = $request->input("vehiculo.kilometros");
            $vehiculoCreate->revtecnica = $request->input("vehiculo.revtecnica");
            $vehiculoCreate->llantas = $request->input("vehiculo.llantas");
            $vehiculoCreate->otros = $request->input("vehiculo.otros");
            $vehiculoCreate->patente = $request->input("vehiculo.patente");
            $vehiculoCreate->fecha_registro = $fechaRegistro;
            $vehiculoCreate->costo = $request->input("vehiculo.costo");
            $vehiculoCreate->gasto = $request->input("vehiculo.gasto");
            $vehiculoCreate->comision = $request->input("vehiculo.comision");
            $vehiculoCreate->valor_venta = $request->input("vehiculo.valor_venta");
            $vehiculoCreate->fecha_ultimo_contacto = $fechaRegistro;
            $vehiculoCreate->valor = $request->input("vehiculo.valor");
            $vehiculoCreate->estado = $request->input("vehiculo.estado");
            $vehiculoCreate->combustible = $request->input("vehiculo.combustible");
            $vehiculoCreate->save();
            return response()->json(["data"=>$vehiculoCreate,"msg"=>"ok","status"=>200],200);
        } catch (\Throwable $th) {
            return response()->json(["err"=>$th,"status"=>500],500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
