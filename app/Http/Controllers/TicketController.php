<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketDetalle;
use App\Models\EstadosTicket;
use Auth;
use DB;
use Validator;

class TicketController extends Controller
{
    function crear(Request $request){

        DB::beginTransaction();
        try{
            $estado = EstadosTicket::select('id')->where('codigo','PE')->first();

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

    function indicadores(Request $request){

        $where = [];
        $whereSql = '';
        if(Auth::user()->rol === 'admin'){
        }else{
            $where['user_id'] = Auth::user()->id;
            $whereSql .= " and t.user_id = :user_id";
        }

        $indicadores  =collect(DB::select("select 
                                sum(total) as total,
                                sum(pe) as pe,
                                sum(pr) as pr,
                                sum(cl) as cl
                                from(
                                    select
                                    count(t.id) as total,
                                    case when e.codigo='PE' then count(t.id) else 0 end pe,
                                    case when e.codigo='PR' then count(t.id) else 0 end pr,
                                    case when e.codigo='CL' then count(t.id) else 0 end cl
                                    from tickets t
                                    inner join estados_ticket e on(t.estado_id=e.id)
                                    where 1=1 $whereSql
                                    group by e.codigo
                                ) as t",['user_id'=>Auth::user()->id]))->first();
        
        
        $tickets_totales = 0;
        $tickets_pendientes = 0;
        $tickets_progreso = 0;
        $tickets_cerrado = 0;
        if($indicadores !== null){
            $tickets_totales = $indicadores->total;
            $tickets_pendientes = $indicadores->pe;
            $tickets_progreso = $indicadores->pr;
            $tickets_cerrado = $indicadores->cl;
        }

        return response()->json([
            "tickets_totales" => $tickets_totales,
            "tickets_pendientes" => $tickets_pendientes,
            "tickets_progreso" => $tickets_progreso,
            "tickets_cerrado" => $tickets_cerrado
        ],200);
    }

    function listado (Request $request){

        $where = [];
        if(Auth::user()->rol === 'admin'){
        }else{
            $where['tickets.user_id'] = Auth::user()->id;
        }

        $tickets = Ticket::select('tickets.id','tickets.titulo','tickets.fecha_creacion','estados_ticket.descripcion','estados_ticket.color','users.username')
                ->join('estados_ticket', 'tickets.estado_id', '=', 'estados_ticket.id')
                ->join('users', 'tickets.user_id', '=', 'users.id')
                ->where($where)
                ->orderBy('fecha_creacion', 'DESC')
                ->paginate(3);

        return response()->json([
            'tickets' => $tickets
        ],200);
    }

    public function editar($id){
        
        //$ticket = Ticket::find($id);
        $ticket = Ticket::select('tickets.id','tickets.titulo','estados_ticket.codigo as estado')
                ->join('estados_ticket', 'tickets.estado_id', '=', 'estados_ticket.id')
                ->join('users', 'tickets.user_id', '=', 'users.id')
                ->where('tickets.id',$id)
                ->first();

        $detalles  =collect(DB::select("select 
                                            td.descripcion,td.fecha_creacion,u.username
                                        from ticket_detalles as td
                                        inner join users u on(td.user_id=u.id)
                                        where td.ticket_id = :id
                                        order by fecha_creacion desc",['id'=>$id]));

        return response([
            'ticket' => $ticket,
            'detalles'=> $detalles
        ],200);
    }

    function actualizar(Request $request){

        DB::beginTransaction();
        try{
            if($request->estado === 'PE' && Auth::user()->rol === 'admin'){
                $estado = EstadosTicket::select('id')->where('codigo','PR')->first();

                $ticket = Ticket::find($request->id);
                $ticket->estado_id = $estado->id;
                $ticket->save();
            }

            $ticketdet = new TicketDetalle();
            $ticketdet->ticket_id = $request->id;
            $ticketdet->user_id = Auth::user()->id;
            $ticketdet->descripcion = $request->descripcion;
            $ticketdet->save();

            DB::commit();
            return response()->json([
                'message' => 'The ticket was updated'
            ],200);
        }
        catch(\Exception $e){
            DB::rollback();
            
            return response()->json([
                'message' =>'The ticket could not be updated',
            ], 400);
        }
    }

    function cerrar(Request $request){

        DB::beginTransaction();
        try{
            $estado = EstadosTicket::select('id')->where('codigo','CL')->first();

            $ticket = Ticket::find($request->id);
            $ticket->estado_id = $estado->id;
            $ticket->save();

            DB::commit();
            return response()->json([
                'message' => 'The ticket was updated'
            ],200);
        }
        catch(\Exception $e){
            DB::rollback();
            
            return response()->json([
                'message' =>'The ticket could not be updated',
            ], 400);
        }
    }
}
