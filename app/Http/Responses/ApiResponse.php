<?php

namespace App\Http\Reponses;

class ApiResposne{
    
    /**
     * @param{$message} mensaje custom enviado el cual indica el estado de la llamada
     * @param{$status} Status Code en la cual termina el metodo
     * @param{$data} La información generada en el metodo ejecutado
     * @return {response} una response custom con unb estado success
     */
    public static function succes($message = 'success' , $status=200,$data = []){
        return response()->json([
            'msg' -> $message,
            'status' -> $status,
            'error'->false,
            'data' -> $data,
        ],$status);
    }

        /**
     * @param{$message} mensaje custom enviado el cual indica el estado de la llamada
     * @param{$status} Status Code en la cual termina el metodo
     * @param{$data} La información generada en el metodo ejecutado
     * @param{$errpr} Indica cual ha sido el error en la máquina
     * @return {response} una response custom
     */

    public static function error($message='failed',$status = 500, $data=[],$error= ''){

        return response()->json([
            'msg'-> $message,
            'status'->$status,
            'error'->$error,
            'data'->$data
        ],$status);
    }
}