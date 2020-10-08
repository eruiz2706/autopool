<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\Models\Deposito;
use DB;

class DepositoController extends Controller
{
    public function historial(){
        
        $depositos = Deposito::all()->where('user_id', Auth::user()->id);
        $total_deposito = Deposito::where('user_id', Auth::user()->id)->sum('monto');
        $usuario = User::find(Auth::user()->id);
        
        return response()->json([
            'depositos' => $depositos,
            'total_deposito' => $total_deposito
        ],200);
    }

    public function crear(Request $request){
        
        $validator =Validator::make($request->all(),[
            'monto' =>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->messages(),
                "message" =>  "You must complete amount field"
            ],400);
        }

        DB::beginTransaction();
        try{
            Deposito::create([
                'monto' => $request->monto,
                'confirmacion_id' => date('YmdHis'),
                'user_id' => Auth::user()->id
            ]);

            $usuario = User::find(Auth::user()->id);
            $usuario->total_billetera = $usuario->total_billetera + $request->monto;
            $usuario->save();

            DB::commit();
            return response()->json([
                "message" =>  "Deposite registered successfully",
            ],200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                "message" => 'Deposite registration was not possible',
            ],400);
        }
    }
}
