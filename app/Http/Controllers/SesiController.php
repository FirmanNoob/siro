<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu Berhasil Logout');
    }

    public function register()
    {
        return view('regis');
    }

    public function register_proses(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                // 'password' => Hash::make($request->password)
                'password' => 'required|min:5',
                'nik' => 'required|numeric|digits:16',
                'jabatan' => 'required',
                'nip' => 'required',
                'str' => 'required',
                'jkelamin' => ['required', 'in:lakiLaki,perempuan'],
                'tlahir' => 'required|date|date_format:Y-m-d|before_or_equal:today',
                'agama' => ['required', 'in:islam,kristen,protestan,kristenkatolik,hindu,buddha,konghucu'],
                'pterakhir' => 'required',
                'pangkat' => 'required',
                'alamat' => 'required|string|max:255',
                'nohp' => 'required|numeric|digits_between:10,15',
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'str' => $request->str,
            'jkelamin' => $request->jkelamin,
            'tlahir' => $request->tlahir,
            'agama' => $request->agama,
            'pterakhir' => $request->pterakhir,
            'pangkat' => $request->pangkat,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'password' => $request->password,
            'avatar' => 'user.png',
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah')->withInput();
        }
    }

    public function listUser()
    {
        $data = User::all();

        return view('admin.user', compact('data'));
    }
    public function profil()
    {
        $user = auth()->user();
        return view('admin.userProfile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nik' => 'required|numeric|digits:16',
            'jabatan' => 'required',
            'nip' => 'required',
            'str' => 'required',
            'jkelamin' => ['required', 'in:lakiLaki,perempuan'],
            'tlahir' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'agama' => ['required', 'in:islam,kristen,protestan,kristenkatolik,hindu,buddha,konghucu'],
            'pterakhir' => 'required',
            'pangkat' => 'required',
            'alamat' => 'required|string|max:255',
            'nohp' => 'required|numeric|digits_between:10,15',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->update($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            // Simpan $avatarPath ke kolom avatar di tabel user
            auth()->user()->update(['avatar' => $avatarPath]);
        }


        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
