<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Http\Responses\ApiResponse;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $colores = Color::all();
            $responseMock = ['msg' => "ok",'stauts' => 200,'data' => $colores];
            return response()->json($responseMock,200);
        } catch (\Throwable $th) {
            //throw $th;
            $responseMock = ['msg' =>"Algo ha fallado",'status' => 501,'error' => $th];
            return response()->json($responseMock,501);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Comienza una transacción la cual en caso de que todo salga bien guarda los cambios, en caso de error, elimina lo guardado en caso
        //de que algo se haya guardado
        DB::beginTransaction();
        try {
            $validator = $request->validate([
                "nombre"=>'required'
            ]);
            $color = new Color();
            $color = $request->input('nombre');
            $color->save();
            DB::commit();
            $colores = Color::All();
            $responseMock = ["status"=>200,"msg"=>"ok","data" => $colores];
            return response()->json($responseMock,200);
        } catch (\Throwable $th) {
            DB:rollback();
            $responseMock = ["msg"=>"error al momento de crear los datos"];
            return response()->json($responseMock,500);
        }catch(ValidationException $e){
            return ApiResponse::error("Error de validación",422,[],$e.getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
