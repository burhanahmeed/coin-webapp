<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = Profile::find(Auth::user()->id);        
        // dd($profile);

        if ($profile) {
            return redirect('/wallet');
        }else {
            return view('pages/introIfProfileNotFound');
        }
    }

    public function storeNewProfile (Request $request ) {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'telp' => 'required|numeric',
        ]);

        if ($validator->fails()) {            
            return redirect('/home')
                ->withErrors($validator)
                ->withInput();
        }

        $profile = new Profile;
        $profile->id = Auth::user()->id;
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->address = $request->address;
        $profile->telp_number = $request->telp;
        $profile->save();

        $wallet = new Wallet;
        $wallet->wallet_number = now()->timestamp;
        $wallet->amount = '0';
        $wallet->user_id = Auth::user()->id;
        $wallet->save();

        return redirect('/wallet');
    }
}
