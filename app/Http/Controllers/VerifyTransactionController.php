<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\VerifyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = VerifyTransaction::all();
        return view('app.admin.verify-transaction.index', $data);
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
    public function store(Request $request, $id)
    {
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images/verify'), $imageName);
        $imagePath = 'images/verify/' . $imageName;

        $transaction = Transaction::where('order_code', $id)->first();
        $data['verify'] = VerifyTransaction::create([
            'customer_id'=>$transaction->customer_id,
            'transaction_id'=>$transaction->id,
            'image'=>$imagePath,
            'status'=>'pending'
        ]);
        $data['transaction'] = $transaction;
        $data['data'] = DB::table('transaction')
                        ->join('customers', 'transaction.customer_id', '=', 'customers.id')
                        ->join('concerts', 'transaction.concert_id', '=', 'concerts.id')
                        ->first();
        return view('app.customer.invoice', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = VerifyTransaction::FindOrFail($id);
        return view('app.admin.verify-transaction.detail', $data);
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
        $request->validate([
            'status' => 'required',
        ]);

        DB::beginTransaction();
        try {
            VerifyTransaction::FindOrFail($id)->update([
                'status'=>$request->status,
            ]);
            $ver = VerifyTransaction::where('id', $id)->first();
            $trans = Transaction::where('id', $ver->transaction_id)->first();

            do {
                $random = random_int(1000000000, 9999999999);
            } while (Ticket::where('ticket_code', $random)->exists());

            Ticket::create([
                'ticket_code' => $random,
                'customer_id' => $ver->customer_id,
                'concert_id' => $trans->concert_id,
                'transaction_id' =>$ver->transaction_id,
                'status' => 'not_yet'
            ]);

            DB::commit();
            return redirect('admin/verify-transaction');
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VerifyTransaction::destroy($id);
        return redirect('admin/verify-transaction');
    }
}
