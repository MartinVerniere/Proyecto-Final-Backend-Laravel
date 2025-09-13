<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthControllerApi extends Controller
{
    use HasApiTokens;

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
    
        $user = User::añadirMedico($request);

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'user_name' => $user->username,
            'user_email' => $user->email,
        ], 201);
    }

    public function login(Request $request) {
        // Validar las credenciales del usuario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) { return response()->json(['message' => 'Credenciales inválidas'], 401); }
        
        $user = Auth::user();

        return response()->json([
            'message' => 'Sesion iniciada correctamente',
            'user_name' => $user->username,
            'user_email' => $user->email,
        ], 201);
    }

    public function logout(Request $request) {
        $user = Auth::user();
        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
    }

    /* 
    public function sendResetLinkEmail(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Correo electrónico de restablecimiento de contraseña enviado'])
            : response()->json(['message' => 'No se pudo enviar el correo electrónico de restablecimiento de contraseña'], 400);
    } 
    */ 
}
