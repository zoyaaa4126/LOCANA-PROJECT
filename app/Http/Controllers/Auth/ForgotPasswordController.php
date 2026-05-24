<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPasswordController extends Controller{

    //Kirim OTP
    public function sendOtp(Request $request){

        $request->validate([
            'email' => 'required|email|exist:users,email'
        ]);

        $otp = rand(1000, 9999);

        session([
            'otp' => $otp,
            'reset_email' => $request->email
        ]);

        Mail::raw("Kode OTP kamu adalah: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Kode OTP Reset Password');

        });
        return redirect('/verify-otp');
    }

    
    //Form OTP
    public function showOtpForm(){
        return view('auth.verify-otp');
    }


    //Verfikasi OTP
    public function verifyOtp(Request $request){

        $request->validate([
            'otp' => 'required'
        ]);

        if($request->otp != session('otp')){
            return back()->withErrors(['otp'=> 'OTP Salah']);
        }
        return redirect('/reset-password');
    }


    //Reset Password
    public function showResetForm(){
        return view('auth.reset-password');
    }


    //Update Password
    public function resetPassword(Request $request){

        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = user::where('email', session('email'))->first();

        $user -> update([
            'password' => Hash::make($request -> password)
        ]);

        session()->forget(['otp', 'email']);
        return redirect('/login')->with('success', 'Password berhasil diubah');
    }
}