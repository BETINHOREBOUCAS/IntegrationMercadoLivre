<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\handlers\MeliHandler;

class ProdutoController extends Controller
{

    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginHandler::chekinLogin();

        if ($this->usuarioLogado === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $appId = $this->usuarioLogado->appId;
        $secretKey = $this->usuarioLogado->secretKey;
        $itens = MeliHandler::getProduto($appId, $secretKey);

        for ($i = 0; $i < count($itens['produtosAtivos']); $i++) {
            for ($a = 1; $a < count($itens['produtosAtivos']); $a++) {
                if ($itens['produtosAtivos'][$i]['title'] > $itens['produtosAtivos'][$a]['title']) {
                    $aux = $itens['produtosAtivos'][$i];
                    $itens['produtosAtivos'][$i] = $itens['produtosAtivos'][$a];
                    $itens['produtosAtivos'][$a] = $aux;
                }
            }
        }

        /*echo "<pre>";
        print_r($itens);
        echo "<pre>";*/

        $this->render('produtos', ['produtos' => $itens]);
    }
}
