<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Bank;

class AccountController extends Controller
{
    public function getAccount(){

        $accounts = Account::orderBy('bank_id')->get();
        $users = User::orderBy('name')->get();
        $banks = Bank::orderBy('name')->get();
        return view('layouts.account.add-account', compact('banks', 'users','accounts'));

    }
    

    public function saveAccount(Request $request){

        // dd($request);

        $account = new Account();
        $account->num_account = $request->num_account;
        $account->user_id = $request->user_id;
        $account->bank_id = $request->bank_id;
        $account->amount = $request->amount;
        $account->save();

        return redirect()->route('app.account.get');


    }
}
