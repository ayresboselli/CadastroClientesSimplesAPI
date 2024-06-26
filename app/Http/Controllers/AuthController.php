<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Hash;

class AuthController extends Controller
{
    /**
     * Autentica o usuário
     * @param Request $request
     */
    public function Login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->senha, $user->password))
        {
            $abilities = [];

            // verifica se o usuário é administrador
            if ($user->admin)
            {
                $abilities = ['admin'];
            }

            // cria o token
            $token = $user->createToken('authentication', $abilities);

            return response()->json(['token' => $token->plainTextToken]);
        }
        
        return response('E-mail ou senha inválidos', 401);
    }

    /**
     * Finaliza a autenticação do usuário
     * @param Request $request
     */
    public function Logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response('Logout efetuado com sucesso');
    }
}
