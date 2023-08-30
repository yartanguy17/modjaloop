<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Ledger;

class BankController extends Controller
{
    public function getBank(){
        $banks=Bank::orderBy('name')->get();
        $ledgers=Ledger::orderBy('name')->get();
        return view('layouts.bank.add-bank',compact('ledgers','banks'));
    }

    public function saveBank(Request $request){

        $bank = new Bank();
        $bank->code = $request->code;
        $bank->ledger_id = $request->ledger_id;
        $bank->name = $request->name;
        
        $bank->save();

        return redirect()->route('app.bank.get');
    }
}
