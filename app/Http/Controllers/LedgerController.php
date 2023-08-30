<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dfsp;
use App\Models\Ledger;
use App\Models\Account;
use App\Models\Transaction;

class LedgerController extends Controller
{
    public function getLedger(){
        $ledgers=Ledger::orderBy('name')->get();
        $dfsps=Dfsp::orderBy('code')->get();
        return view('layouts.ledger.add-ledger',compact('ledgers','dfsps'));
    }
   

    public function saveLedger(Request $request){

        // dd($request);

        $ledger = new Ledger();
        $ledger->code = $request->code;
        $ledger->dfsp_id = $request->dfsp_id;
        $ledger->name = $request->name;
        
        $ledger->save();

        return redirect()->route('app.ledger.get');
    }

    public function chequeAccount(Request $request){

        

        $account_cheque = $request->account;

         $account = Account::where('num_account', $account_cheque)->get()->first();

        if($account){

            $transactions = Transaction::where('account_sender_id', $account->id)->where('ledger_v', false)->get();
            foreach($transactions as $transaction){
                $transaction->ledger_v = true;
                $transaction->save();
                return back()->with("info", "Le numero de compte accepté par dfsp ledger.");
            }
        } else{
            return back()->with("info", "Le numero de compte rejetter par dfsp ledger.");
        }
       
        

    }
}
