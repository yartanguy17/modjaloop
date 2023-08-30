<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dfsp;
use App\Models\Account;
use App\Models\Transaction;

class DfspController extends Controller
{
    public function getDfsp(){
        $dfsps = Dfsp::orderBy('code')->get();
        return view('layouts.dfsp.dfsp',compact('dfsps'));
    }

    public function saveDfsp(Request $request){
        $dfsp = new Dfsp();

        $dfsp->code = $request->code;
        $dfsp->nom = $request->nom;

        $dfsp->save();

        return redirect()->route('app.dfsp.get');
    }

    public function chequeAccount(Request $request){



        $account_cheque = $request->account;

         $account = Account::where('num_account', $account_cheque)->get()->first();

        if($account){

            $transactions = Transaction::where('account_receiver_id', $account->id)->where('ledger_v', true)->where('dfsp_v', false)->get();
            foreach($transactions as $transaction){
                $transaction->dfsp_v = true;
                $transaction->save();

                return back()->with("info", "Le numero de compte accepté par dfsp ledger.");
            }
        } else{

            return back()->with("info", "Le numero de compte rejetter par dfsp ledger.");
        }



    }
}
