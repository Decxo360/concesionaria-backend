<?php

namespace App\Http\Controllers;

use App\Models\Liviano;
use Illuminate\Http\Request;

class LivianoController extends Controller
{
    /**
     * Get options for the query
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request -> query('limit', 6);
        $order = $request -> query('order', "asc");
        $page = $request -> query('page', 1);

        try {
            
            $livianos = Liviano::with("vehiculo.dueno","vehiculo.color","vehiculo.modelo","vehiculo.usuario")
                ->offset(($page - 1)*$limit)
                ->orderby("idliviano",$order)
                ->limit($limit)
                ->get();

            $totalLivianos = Liviano::count();
            $livianosSinAtributos = $livianos->map(function ($liviano){
                $liviano->makeHidden(["idvehiculo"]);
                $liviano->vehiculo->makeHidden(["idusuario","idmodelo","idcolor","iddueno"]);
                $liviano->vehiculo->usuario->makeHidden(["clave"]);
                return $liviano;
            });

            return response()->json([
                'data' => $livianosSinAtributos, 
                'pageNext' => $page + 1,
                "total"=>$totalLivianos
                ],
            200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th,501);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Liviano  $liviano
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {   
        try {
            $liviano = Liviano::with("vehiculo.modelo","vehiculo.color","vehiculo.usuario","vehiculo.dueno")->find($id);
            return response()->json(["msg"=>"ok","status"=>200,"data"=>$liviano],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["error"=>$th],501);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liviano  $liviano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liviano $liviano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liviano  $liviano
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        try {
            $liviano = Liviano::where("idliviano",$id)->delete();
            $livianos = Liviano::with("vehiculo.usuario","vehiculo.modelo","vehiculo.color","vehiculo.dueno")->get();
            return response()->json(["data"=>$livianos,"msg"=>"ok","status"=>"200","deleted"=>"liviano with id: $id has been deleted"],200);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["error"=>$th,"msg"=>"ha ocurrido un problema con el servidor"],500);
        }
    }
}
