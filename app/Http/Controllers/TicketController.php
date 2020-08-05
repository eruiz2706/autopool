<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketDetalle;
use App\Models\Estados;
use Auth;
use DB;
use Validator;

class TicketController extends Controller
{
    function crear(Request $request){

        DB::beginTransaction();
        try{
            $estado = Estados::select('id')->where('tipo','ticket')->where('codigo','PE')->first();

            $ticket = new Ticket();
            $ticket->titulo = $request->subject_ticket;
            $ticket->user_id = Auth::user()->id;
            $ticket->estado_id = $estado->id;
            $ticket->save();

            $ticketdet = new TicketDetalle();
            $ticketdet->ticket_id = $ticket->id;
            $ticketdet->user_id = Auth::user()->id;
            $ticketdet->descripcion = $request->description_ticket;
            $ticketdet->save();

            DB::commit();
            return response()->json([
                'message' => 'ticket '.$ticket->id.' was created',
                'datos' => $estado
            ],200);
        }
        catch(\Exception $e){
            DB::rollback();
            
            return response()->json([
                'message' =>'Ticket could not be created',
            ], 400);
        }
    }

    function listado (Request $request){
        /*$tickets = Ticket::where("user_id",Auth::user()->id)
        ->paginate(10);*/

        $tickets = Ticket::select('tickets.id','tickets.titulo','tickets.created_at','estados.descripcion','estados.color')
                ->join('estados', 'tickets.estado_id', '=', 'estados.id')
                ->paginate(10);

        return response()->json([
            "tickets" => $tickets,
        ],200);
    }
}
