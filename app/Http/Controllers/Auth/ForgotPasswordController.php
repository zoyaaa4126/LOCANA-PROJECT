<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;
use PharIo\Manifest\Email;

class ForgotPasswordController extends Controller{

    public function showEmailForm(){
        return view('auth.forgotPassword'); 

    }

    //Kirim OTP
    public function sendOtp(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users,email'], 
            ['email.required' => 'email tidak boleh kosong',
             'email.email'    => 'format email tidak valid',
             'email.exists'   => 'email tidak terdaftar',
]);

        $otp = rand(1000, 9999);

        PasswordReset::where('email', $request->email)->delete();
        PasswordReset::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => Carbon::now('Asia/Jakarta')->addMinutes(5),
        ]);

        Mail::raw("Kode OTP kamu adalah: $otp", function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Kode OTP Reset Password');
        });

        session(['reset_email' => $request->email]);
        return redirect('/verify-otp');
    }

    
    //Form OTP
    public function showOtpForm(){
        return view('auth.verifyOTP');
    }


    //Verfikasi OTP
    public function verifyOtp(Request $request){

        $request->validate([
            'otp' => 'required'],
            ['otp.required' => 'kolom otp tidak boleh kosong'
        ]);

        $record = PasswordReset::where('email', session('reset_email'))
                    ->where('otp', $request->otp)
                    ->first();

        if(!$record){
            return back()->withErrors(['otp' => 'OTP Salah']);
        }

        if(Carbon::now('Asia/Jakarta')->isAfter($record->expires_at)){
            $record->delete();
            return back()->withErrors(['otp'=> 'OTP sudah kadaluarsa']);
        }

        $record->delete();
        return redirect('/reset-password');
    }

    //Kirim Kode OTP
    public function resendOtp(Request $request){
        $email = session('reset_email');
        
        if(!$email){
            return redirect('/forgot-password');
        }

        $otp = rand(1000, 9999);

        PasswordReset::where('email', $email) -> delete();
        PasswordReset::create([
            'email' => $email,
            'otp' => $otp,
            'expires_at' => Carbon::now('Asia/Jakarta')->addMinutes(5),
        ]);
        
        Mail::raw("Kode OTP kamu adalah: $otp", function($message) use ($email) {
            $message->to($email)
                    ->subject('Kode OTP Reset Password');
        });

        return back()->with('success', 'Kode OTP baru telah dikirim!');
    }

    //Reset Password
    public function showResetForm(){
        return view('auth.resetPassword');
    }


    //Update Password
    public function resetPassword(Request $request){

        $request->validate([
            'password' => 'required|min:6|confirmed'], 
             ['password.required' => 'password tidak boleh kosong',
              'password.min'      => 'password minimal 6 karakter',
              'password.confirmed'=> 'konfirmasi password tidak cocok',
        ]);

        $user = User::where('email', session('reset_email'))->first();

        $user -> update([
            'password' => Hash::make($request -> password)
        ]);

        session()->forget(['otp', 'reset_email']);
        return redirect('/success');
    }

    public function showSuccess(){
        return view('auth.success');
    }
}