<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\Transaction;
use Validator;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        return view('pages/dashboard/home', compact('wallet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transfer(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'wnum' => 'required',
            'amount' => 'required|numeric',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {            
            return redirect('/wallet')
                ->withErrors($validator)
                ->withInput();
        }
        $wallet = Wallet::where('wallet_number', $request->wnum)->first();
        $ownWallet = Wallet::where('user_id', Auth::user()->id)->first();
        if ($ownWallet->wallet_number == $request->wnum) {
            $input = $request->wnum;
            return view('pages/dashboard/transfer_process_fail', compact('input'));
        }
        if ($wallet && $wallet->getUser->email == $request->email) {
            $input = $request->all();
            return view('pages/dashboard/transfer_process', compact('input'));
        }else {
            $input = $request->wnum;
            return view('pages/dashboard/transfer_process_fail', compact('input'));
        }
    }

    public function proceed (Request $request) {
        $refNum = 'trans-'.now()->timestamp;
        $wallet = Wallet::where('wallet_number', $request->wnum)->first();
        if ($wallet && $wallet->getUser->email == $request->email) {
            $wallet_from = Wallet::where('user_id', Auth::user()->id)->first();
            if ($wallet_from->amount >= $request->amount) {                
                $wallet_from->amount = (int)$wallet_from->amount - (int)$request->amount;
                $wallet_from->save();
                // 1st transaction for kredet
                $transaction = new Transaction;
                $transaction->wallet_id = $wallet_from->wallet_number;
                $transaction->refNumber = $refNum;
                $transaction->type = 'k';
                $transaction->amount = $request->amount;
                $transaction->save();
                // 2and transaction for debit
                $transaction = new Transaction;
                $transaction->wallet_id = $wallet->wallet_number;
                $transaction->refNumber = $refNum;
                $transaction->type = 'd';
                $transaction->amount = $request->amount;
                $transaction->save();
    
                $wallet->amount = (int)$wallet->amount + (int)$request->amount;
                $wallet->save();
                return redirect('/wallet/transfer-success/'.$refNum);
            }else {
                $input = $request->wnum;
                return view('pages/dashboard/transfer_process_fail', compact('input'));
            }
        }else {
            $input = $request->wnum;
            return view('pages/dashboard/transfer_process_fail', compact('input'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function success($ref)
    {
        $dari = Transaction::where('refNumber', $ref)->where('type', 'k')->first();
        $ke = Transaction::where('refNumber', $ref)->where('type', 'd')->first();
        if ($dari && $ke) {
            // \dd($dari->getWallet->getUser);
            return view('pages/dashboard/transfer_process_success', compact('dari', 'ke'));
        }
        return abort(404);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
