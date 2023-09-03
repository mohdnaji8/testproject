<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $accounts = Account::where('user_id', Auth::user()->id)->get();

        return view('dashboard',compact('accounts'));
    }
    public function show($id){
        $transactions = Transaction::where('account_id', $id);
        return view('show',compact('transactions'));
    }
}
