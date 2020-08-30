<?php
namespace src\controllers;

use \core\Controller;
use src\Config;
use src\handlers\LoginHandler;
use src\handlers\MeliHandler;

class HomeController extends Controller {

    private $usuarioLogado;

    public function __construct() {
        $this->usuarioLogado = LoginHandler::chekinLogin();

        if ($this->usuarioLogado === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $redirectURI = 'http://localhost/integration/public/';
        $appId = $this->usuarioLogado->appId;
        $secretKey = $this->usuarioLogado->secretKey;
        $siteId = $this->usuarioLogado->siteId;  

        $link = new MeliHandler();
        $link = $link->acessar($redirectURI, $appId, $secretKey, $siteId);  
                    
        if (empty($link['link'])) {
            
            $info = MeliHandler::getInfo($appId, $secretKey);

            $this->render('home', ['info' => $info]);
        } else {
            $botao = $link['link'];
            $this->render('autenticar', ['botao' => $botao]);
        }
                
    }

}