<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validationRules = [
            'email' => 'required',
            'password'   => 'required',
        ];

        $validationMessages = [
            'email.required' => 'Email harus diisi.',
            'password.required'   => 'Password harus diisi.',
        ];

        $validation = Validator::make($request->all(), $validationRules, $validationMessages);

        if ($validation->fails()) {
            return response()->json($response = [
                'status' => false,
                'message' => 'Login Anda Gagal',
                'errors'  => $validation->errors()->messages(),
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json($response = [
                'status' => false,
                'message' => 'Login Anda Gagal',
                'errors' => 'No. Payroll/Email Dan Password Anda Masukkan Salah',
            ]);
        }

        $token = $user->createToken("Login: {$user->fullname}")->plainTextToken;

        $response = [
            'status' => true,
            'message' => 'Login Berhasil',
            'token' => $token,
            'data' => $user,
        ];

        return response()->json($response);
    }
}
