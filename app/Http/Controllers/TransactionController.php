<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\VerifyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Transaction::all();
        return view('app.admin.transaction.index', $data);
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
        Transaction::create([
            'name'=>$request->name,
            'address'=>$request->address,
        ]);
        return redirect('admin/transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Transaction::FindOrFail($id);
        return view('app.admin.transaction.detail', $data);
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
        Transaction::find($id)->update([
            'name'=>$request->name,
            'address'=>$request->address
        ]);
        return redirect('admin/transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::destroy($id);
        return redirect('admin/transaction');
    }

    public function showOrder($id){
        $data['data'] = Concert::FindOrFail($id);
        return view('app.customer.order', $data);
    }

    public function storeOrder(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nik' => 'required',
                'full_name' => 'required',
                'birth_date' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
            $customer = Customer::create([
                'user_id'=>Auth::user()->id,
                'nik' => $request->nik,
                'full_name' => $request->full_name,
                'birth_date' => $request->birth_date,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            $concert = Concert::FindOrFail($request->concert_id);
            $transaction = Transaction::create([
                'customer_id'=>$customer->id,
                'concert_id'=>$request->concert_id,
                'amount'=> $concert->price,
                'status'=>'pending',
                'order_code'=>Str::random(12),
            ]);
            $data['transaction'] = $transaction;



            DB::commit();
            return view("app.customer.invoice", $data)->with('success', 'Pendaftaran Berhasil');

        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function invoice($id)
    {
        $data['transaction'] = Transaction::where('order_code',$id)->first();
        $tr = Transaction::where('order_code',$id)->first();
        $data['data'] = DB::table('transaction')
                        ->join('customers', 'transaction.customer_id', '=', 'customers.id')
                        ->join('concerts', 'transaction.concert_id', '=', 'concerts.id')
                        ->first();
        $data['verify'] = VerifyTransaction::where('transaction_id', $tr->id)->first();

        return view('app.customer.invoice', $data);
    }


}
