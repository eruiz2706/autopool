<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Deposito;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function indicadores(Request $request){
        //DB::connection()->enableQueryLog();
        $usuario = User::find(Auth::user()->id);
        $total_deposito = Deposito::where('user_id', Auth::user()->id)->sum('monto');
        $referidos = User::where('referido_id',Auth::user()->id)->count();
        //$log= DB::getQueryLog();

        return response()->json([
            'account_balance' => $usuario->total_billetera,
            'total_deposites' => $total_deposito,
            'tota_withdraw' => 0,
            'total_referrals' => $referidos,
            'total_pools' => 0,
            'lottery_win' => 0,
            
        ],200);
    }
}
