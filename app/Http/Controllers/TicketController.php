<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = DB::table('tickets')
                        ->join('customers', 'tickets.customer_id', '=', 'customers.id')
                        ->join('concerts', 'tickets.concert_id', '=', 'concerts.id')
                        ->join('transaction', 'tickets.transaction_id', '=', 'transaction.id')
                        ->select('tickets.*', 'customers.full_name', 'concerts.name', 'transaction.order_code')
                        ->get();
        return view('app.admin.ticket.index', $data);
    }

    public function customerIndex()
    {
        $customer = Customer::where('user_id', Auth::user()->id )->first();
        $data['data'] = Ticket::where('customer_id', $customer->id)->get();
        return view('app.customer.ticket.index', $data);
    }

    public function searchTicket()
    {
        return view('app.admin.ticket.search-ticket');
    }
    public function searchTicketPost(Request $request)
    {
        $ticket = Ticket::where('ticket_code', $request->ticket_code)->first();
        if (Ticket::where('ticket_code', $request->ticket_code)->exists()) {
            $data['ticket'] = $ticket;
            return view('app.admin.ticket.use-ticket', $data)->with('success','Ticket was found');
        } else {
            return view('app.admin.ticket.search-ticket')->with('error','Ticket not found');
        }
    }

    public function useTicket()
    {
        return view('app.admin.ticket.use-ticket');
    }
    public function useTicketPost(Request $request)
    {
        $data['ticket'] = Ticket::where('ticket_code', $request->ticket_code)->first()->update([
            'status'=>'used'
        ]);
        return view('app.admin.ticket.search-ticket')->with('success','Ticket was used');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        Ticket::create([
            'name'=>$request->name,
            'address'=>$request->address,
        ]);
        return redirect('admin/ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Ticket::FindOrFail($id);
        return view('app.admin.ticket.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Ticket::find($id)->update([

        ]);
        return redirect('admin/ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect('admin/ticket');
    }
}
