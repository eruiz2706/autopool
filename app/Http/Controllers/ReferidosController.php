<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
use App\User;

class ReferidosController extends Controller
{
    public function listado(Request $request){

        $referidos = User::where("referido_id",Auth::user()->id)->paginate(1);

        return response()->json([
            "referidos" => $referidos,
        ],200);
    }
}
