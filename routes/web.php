<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@getHome')->name('app.dasboard');

Route::prefix('users')->group(function(){
    Route::get('/', 'UserController@getUsers')->name('app.users.get');
    Route::post('/save-user', 'UserController@saveUser')->name('app.users.save');
});


Route::prefix('dfsp')->group(function(){
    Route::get('/', 'DfspController@getDfsp')->name('app.dfsp.get');
    Route::post('/save-dfsp', 'DfspController@saveDfsp')->name('app.dfsp.save');
    Route::post('/cheque-dfsp-account', 'DfspController@chequeAccount')->name('app.chequedfsp.save');
}); 


Route::prefix('ledgers')->group(function(){
    Route::get('/', 'LedgerController@getLedger')->name('app.ledger.get');
    Route::post('/save-ledger', 'LedgerController@saveLedger')->name('app.ledger.save');
    Route::post('/cheque-ledger', 'LedgerController@chequeAccount')->name('app.chequed.save');
}); 


Route::prefix('banks')->group(function(){
    Route::get('/', 'BankController@getBank')->name('app.bank.get'); 
    Route::post('/save-bank', 'BankController@saveBank')->name('app.bank.save');
}); 


Route::prefix('accounts')->group(function(){
    Route::get('/', 'AccountController@getAccount')->name('app.account.get');
    Route::post('/save-account', 'AccountController@saveAccount')->name('app.account.save');
}); 

Route::prefix('transactions')->group(function(){
    Route::get('/', 'TransactionController@getTransaction')->name('app.transaction.get');
    Route::post('/save-transaction', 'TransactionController@saveTransaction')->name('app.transaction.save');
});




