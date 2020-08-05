<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\Deposito;

class DepositoController extends Controller
{
    public function init(){
        $payeer = Auth::user()->payeer;

        return response()->json([
            'depositos' => Deposito::all()->where('id_user',  $payeer)
        ],200);
    }

    public function register(Request $request){
        $payeer = Auth::user()->payeer;

        $validator =Validator::make($request->all(),[
            'monto' =>'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->messages(),
                "message" =>  "You must complete amount field"
            ],400);
        }

        try{
            $usuario = Deposito::create([
                'monto' => $request->monto,
                'idconfirmacion' => "PR1458PR",
                'id_user' => $payeer
            ]);

            return response()->json([
                "message" =>  "Deposite registered successfully",
            ],200);
        }catch(\Exception $e){
            return response()->json([
                "message" => 'Deposite registration was not possible'.$e,
            ],400);
        }
    }
}
