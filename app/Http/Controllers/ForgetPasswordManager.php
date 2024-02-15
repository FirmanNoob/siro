<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgetPasswordManager extends Controller
{
    function lupaPassword()
    {
        return view('lupaPassword');
    }

    // function lupaPasswordPost(Request $request)
    // {
    //     $request->validate(['email' => 'required|email']);

    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //         ? back()->with(['status' => __($status)])
    //         : back()->withErrors(['email' => __($status)]);
    // }
    function lupaPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' =>  $request->email,
            'token' =>  $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.lupaPassword", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route('lupaPassword'))->with('success', 'We have send an email to reset password');
    }

    function resetPassword($token)
    {
        return view('passwordBaru', compact('token'));
    }

    function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required"
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            "email" => $request->email,
            "token" => $request->token
        ]);

        if (!$updatePassword) {
            return redirect()->to(route('resetPassword'))->with('error', 'invalid');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(["email" => $request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password reset success');
    }
}
