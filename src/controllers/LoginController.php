<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use \src\handlers\Meli;
use src\models\User;

class LoginController extends Controller
{

    public function login()
    {
        $aviso = '';
        $error = '';
        if (!empty($_SESSION['aviso'])) {
            $aviso = $_SESSION['aviso'];
            $error = $_SESSION['error'];
            $_SESSION = [];
        }
        $this->render('login', ['aviso' => $aviso, 'error' => $error]);
    }

    public function loginAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        if (!empty($email) && !empty($senha)) {
            $token = LoginHandler::VerifyLogin($email, $senha);
            if ($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION = ['aviso' => 'E-mail ou senha não confere!', 'error' => 'error'];
                $this->redirect('/login');
            }
        } else {
            $_SESSION = ['aviso' => 'Prencha todos os campos!', 'error' => 'error'];
            $this->redirect('/login');
        }
    }

    public function cadastrar()
    {
        $aviso = '';
        $error = '';
        if (!empty($_SESSION)) {
            $aviso = $_SESSION['aviso'];
            $error = $_SESSION['error'];
            $_SESSION = [];
        }
        $this->render('cadastro', ['aviso' => $aviso, 'error' => $error]);
    }

    public function cadastrarAction()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $appId = filter_input(INPUT_POST, 'appId', FILTER_SANITIZE_STRING);
        $secretkey = filter_input(INPUT_POST, 'secretKey', FILTER_SANITIZE_STRING);
        $pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha');
        $senha2 = filter_input(INPUT_POST, 'senha2');

        if ($nome && $email && $appId && $secretkey && $pais && $senha && $senha2) {
            $_SESSION = [];
            if ($senha === $senha2) {
                if (LoginHandler::emailExist($email)) {
                    $_SESSION = ['aviso' => "E-mail já cadastrado!", 'error' => "error"];
                } else {
                    LoginHandler::addUser($nome, $email, $appId, $secretkey, $pais, $senha);

                    $_SESSION = ['aviso' => 'Cadastro realizado com sucesso!', "error" => "sucesso"];
                }
            } else {
                $_SESSION = ['aviso' => "Senhas não conferem!", 'error' => "error"];
            }
        } else {
            $_SESSION = ['aviso' => "Todos os campos devem ser preenchidos!", 'error' => "error"];
        }
        $this->redirect('/cadastro');
    }

    public function sair() {
        $_SESSION = [];
        $this->redirect('/login');
    }
}
