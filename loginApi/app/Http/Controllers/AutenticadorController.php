<?php

namespace App\Http\Controllers;

use App\Events\EventNovoRegistro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AutenticadorController extends Controller
{
    public function registro(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => Str::random(60),
        ]);

        $user->save();

        event(new EventNovoRegistro($user));

        return response()->json([
            'res' => 'Usuario cadastrado',
        ], 201);
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
            'active' => 1
        ];

        if (!Auth::attempt($credenciais))
            return response()->json([
                'res' => 'Acesso negado'
            ], 401);

        $user = $request->user();
        $token = $user->createToken('token de acesso')->accessToken;

        return response()->json([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'res' => 'Deslogado com sucesso'
        ]);
    }

    public function ativarRegistro($id, $token){
        $user = User::find($id);
        if($user){
            if($user->token == $token){
                $user->active = true;
                $user->token = '';
                $user->save();
                return view('registroAtivo');
            }
        }
        return view('registroErro');
    }
}
