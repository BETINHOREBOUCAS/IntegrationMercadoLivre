<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\MeliHandler;
use src\models\User;

class UserController extends Controller {

    private $usuarioLogado;

    public function __construct() {
        $this->usuarioLogado = LoginHandler::chekinLogin();

        if ($this->usuarioLogado === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $appId = $this->usuarioLogado->appId;
        $secretKey = $this->usuarioLogado->secretKey; 

        $usuario = MeliHandler::getData($appId, $secretKey);
        $data = new User();
        $data->id = $usuario['body']->id;
        $data->nomeUsuario = $usuario['body']->nickname;
        $data->email = $usuario['body']->email;
        $data->nome = $usuario['body']->first_name;
        $data->sobreNome = $usuario['body']->last_name;
        $data->endereco = $usuario['body']->address->address;
        $data->cidade = $usuario['body']->address->city;
        $data->estado = $usuario['body']->address->state;
        $data->cep = $usuario['body']->address->zip_code;
        $data->img = $usuario['body']->thumbnail->picture_url;
        $data->cpf = $usuario['body']->identification->number;
        $data->code = $usuario['body']->phone->area_code;
        $data->fone = $usuario['body']->phone->number;
        
        $this->render('perfil', ['data' => $data]);        
    }
    
    

}