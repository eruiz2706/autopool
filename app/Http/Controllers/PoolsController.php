<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pool;
use App\Models\CompraPool;
use App\Models\CompraPoolDetalle;
use App\User;
use DB;
use Auth;

class PoolsController extends Controller
{
    /**
     * Listado de pools
     */
    public function listado(Request $request){

        $pools = Pool::all();
        $usuario = User::find(Auth::user()->id);
        
        return response()->json([
            'pools' => $pools,
            'pool_activa' => $usuario->pool_activa
        ],200);
    }

    /**
     * Metodo para realizar compra de un pool
     */
    public function comprar(Request $request){

        DB::beginTransaction();
        try{
            $pool = Pool::find($request->id);
            $useradmin = User::where('rol','admin')->first();
            $usuario = User::find(Auth::user()->id);

            if($pool->valor > $usuario->total_billetera){
                DB::rollback();
                return response()->json([
                    "message" => 'you do not have enough balance to make the investment',
                ],400);
            }

            /*valiad si ya existe una compra de la pool, de ser asi ya no se permite una nueva compra*/
            $validaCompraPool = CompraPool::where('user_id',Auth::user()->id)->where('pool_id',$request->id)->first();
            if(!empty($validaCompraPool)){
                DB::rollback();
                return response()->json([
                    "message" => 'you already have an investment',
                ],400);
            }
            
            /*descuento del monto de la pool, del total de deposito del usuario*/
            $usuario->total_billetera = $usuario->total_billetera - $pool->valor;
            $usuario->save();

            $compraPool = new CompraPool();
            $compraPool->user_id = Auth::user()->id;
            $compraPool->valor = $pool->valor;
            $compraPool->pool_id = $request->id;
            $compraPool->secuencia_pool = $pool->secuencia_pool;
            $compraPool->ciclo_pool = 1;
            $compraPool->save();

            $referido_id = ($usuario->referido_id == '') ? $useradmin->id : $usuario->referido_id;
            $compraDetalle = new CompraPoolDetalle();
            $compraDetalle->compra_id = $compraPool->id;
            $compraDetalle->user_id = $referido_id;
            $compraDetalle->valor = $pool->valor * 0.1;
            $compraDetalle->descripcion = '10% referido';
            $compraDetalle->save();

            $compraDetalle = new CompraPoolDetalle();
            $compraDetalle->compra_id = $compraPool->id;
            $compraDetalle->user_id = $useradmin->id;
            $compraDetalle->valor = $pool->valor * 0.1;
            $compraDetalle->descripcion = '10% admin';
            $compraDetalle->save();

            $compraDetalle = new CompraPoolDetalle();
            $compraDetalle->compra_id = $compraPool->id;
            $compraDetalle->user_id = $pool->id_pool;
            $compraDetalle->valor = $pool->valor * 0.8;
            $compraDetalle->descripcion = '80% saldo';
            $compraDetalle->save();
            
            //se le abono al id de la pool

            $pool->secuencia_pool = $pool->secuencia_pool+1;
            if($compraPool->secuencia_pool == $pool->secuencia_retiro){
                $pool->id_pool = $pool->id_pool+1;
                $pool->secuencia_retiro = $pool->secuencia_retiro + $pool->cantidad_pool;

                //se habilita el retiro de la pool
            }
            $pool->save();

            
            

            DB::commit();
            return response()->json([
                "message" =>  "Right investment",
            ],200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                "message" => 'Deposite registration was not possible'.$e,
            ],400);
        }

    }
}
