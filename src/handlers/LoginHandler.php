<?php

namespace src\handlers;

use src\models\User;

class LoginHandler
{

    public static function VerifyLogin($email, $senha)
    {
        $usuario = User::select()->where('email', $email)->one();

        if ($usuario) {
            if (password_verify($senha, $usuario['senha'])) {
                $token = md5(time() . rand(0, 9999) . time());

                User::update()->set('token', $token)->where('email', $email)->execute();
                return $token;
            } else {
                echo 'senha não confere';
            }
        } else {
            echo "não";
        }
    }

    public static function chekinLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if ($data) {
                $usuarioLogado = new User();
                $usuarioLogado->nome = $data['nome'];
                $usuarioLogado->email = $data['email'];
                $usuarioLogado->appId = $data['appid'];
                $usuarioLogado->secretKey = $data['secretkey'];
                $usuarioLogado->code = $data['code'];
                $usuarioLogado->siteId = $data['siteid'];

                return $usuarioLogado;
            }
        }
        return false;
    }

    public static function emailExist($email)
    {
        $resp = User::select()->where('email', $email)->one();
        return $resp;
    }

    public static function addUser($nome, $email, $appId, $secretkey, $pais, $senha)
    {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        User::insert([
            'nome' => $nome,
            'email' => $email,
            'appid' => $appId,
            'secretkey' => $secretkey,
            'siteid' => $pais,
            'senha' => $senha
        ])->execute();
    }
}