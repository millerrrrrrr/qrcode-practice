<?php

namespace App\Http\Controllers;

use App\Models\Acc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AuthController extends Controller
{
    public function showSignin(){
        return view('auth.signin');
    }

    public function showSignup(){
        return view('auth.signup');
    }

    public function signupPost(Request $request){
        $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|date',
            'age' => 'required|string',
            'gender' => 'required|string',
            'accid' => 'required|string|unique:accs,accid',
            'username' => 'required|string|max:255|unique:accs,username',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ], [
            'password.min' => 'Password must be at least 6 characters'
        ]);

        $role = $request->role ?? 'user';

        $accid = $request->accid;

        $qrImageName = $accid . 'png';
        $qrPath = public_path('qrCode/' . $qrImageName);

        if (!file_exists(public_path('qrCode'))){
            mkdir(public_path('qrCode'), 0777, true);
        }

        QrCode::format('png')
        ->size(300)
        ->margin(2)
        ->generate($accid, $qrPath);

        $user = Acc::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'age' => $request->age,
            'gender' => $request->gender,
            'accid' => $request->accid,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'qr_code' => 'qrCode/' . $qrImageName,
        ]);

        return redirect()->route('showSignin')->with('success', 'Regsitered Successfully');

    }
}
