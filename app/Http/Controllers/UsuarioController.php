<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;

class UsuarioController extends Controller
{
    public function init(){

        $user = Auth::user();
        $menu = [];
        $menu_top = [];

        if($user !== null){
            if($user->rol === 'admin'){
                $menu = [
                    ["titulo" => 'Dashboard','url' => '/dashboard-admin', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Investment Plans','url' => '/deposite', "icono" => 'fa-tachometer-alt']
                ];
    
                $menu_top = [
                    ["titulo" => 'Edit Profile','url' => '/profile', "icono" => 'fa-user'],
                    ["titulo" => 'Support Tickets','url' => '/tickets', "icono" => 'fa-tags'],
                ];
            }else{
                $menu = [
                    ["titulo" => 'Dashboard','url' => '/dashboard', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Investment Plans','url' => '/investments', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Deposite Now','url' => '/deposite', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Deposite History','url' => '/deposite-history', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Withdraw','url' => '/withdraw', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Withdraw History','url' => '/withdraw-history', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Transaction History','url' => '/transaction-history', "icono" => 'fa-tachometer-alt'],
                    ["titulo" => 'Lotery','url' => '/lottery', "icono" => 'fa-tachometer-alt'],
                ];
        
                $menu_top = [
                    ["titulo" => 'Edit Profile','url' => '/profile', "icono" => 'fa-user'],
                    ["titulo" => 'Referral Stadistic','url' => '/referral', "icono" => 'fa-user'],
                    ["titulo" => 'Support Tickets','url' => '/tickets', "icono" => 'fa-tags'],
                ];
            }
        }

        $jsonresponse=[
            'user' => Auth::user(),
            'menu' => $menu,
            'menu_top' => $menu_top
        ];
        return response()->json($jsonresponse,200);
    }

    public function login(Request $request){
        
        if(Auth::attempt(['payeer' => $request->payeer,'password'=>$request->payeer],false)){
            $user = Auth::user();
            $jsonresponse=[
                'user' => $user
            ];
            return response()->json($jsonresponse,200);
        }else{
            return response()->json([
                'error' => 'Id payeer wrong'
            ],400);
        }
    }

    public function register(Request $request){
       
        $validator =Validator::make($request->all(),[
            'username' =>'required|string',
            'email' =>'required|string',
            'payeer' =>'required|string|unique:users,payeer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->messages(),
                "message" =>  "You must complete some fields"
            ],400);
        }

        try{
            $usuario = User::create([
                'username' => $request->username,
                'payeer' => $request->payeer,
                'email' => $request->email,
                'password' => Hash::make($request->payeer),
                'rol' => 'cliente'
            ]);

            Auth::attempt(['payeer' => $request->payeer,'password'=>$request->payeer],false);

            return response()->json([
                "message" =>  "Registration completed successfully",
            ],200);
        }catch(\Exception $e){
            return response()->json([
                "message" => 'Registration was not possible'.$e,
            ],400);
        }
    }

    public function logout(){
        Auth::logout();
    }
}
