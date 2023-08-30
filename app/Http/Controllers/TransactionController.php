<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;


class TransactionController extends Controller
{
    public function getTransaction(){
        $accounts = Account::all();
        $transactions = Transaction::orderBy('code')->get();
        
        return view('layouts.transaction.add-transaction', compact('transactions','accounts'));
    }
   
    

    public function saveTransaction(Request $request){

        // dd($request);

        $transactions = new Transaction();
        $transactions->code = $request->code;
        $transactions->account_sender_id = $request->account_sender_id;
        $transactions->account_receiver_id = $request->account_receiver_id;
        $transactions->amount = $request->amount;
        $transactions->save();

        return redirect()->route('app.transaction.get');


    }
}
