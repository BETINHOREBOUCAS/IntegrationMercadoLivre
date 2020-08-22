<?php

namespace src\handlers;

use Exception;
use \src\handlers\Meli;
use src\models\User;

class MeliHandler
{
    public function acessar($redirectURI, $appId, $secretKey, $siteId)
    {

        $meli = new Meli($appId, $secretKey);


        if (isset($_GET['code']) || isset($_SESSION['access_token'])) {

            // If code exist and session is empty
            if (isset($_GET['code']) && !isset($_SESSION['access_token'])) {
                // //If the code was in get parameter we authorize
                try {
                    $user = $meli->authorize($_GET["code"], $redirectURI);

                    // Now we create the sessions with the authenticated user
                    $_SESSION['access_token'] = $user['body']->access_token;
                    $_SESSION['expires_in'] = time() + $user['body']->expires_in;
                    $_SESSION['refresh_token'] = $user['body']->refresh_token;
                } catch (Exception $e) {
                    echo "Exception: ",  $e->getMessage(), "\n";
                }
            } else {

                // We can check if the access token in invalid checking the time
                if ($_SESSION['expires_in'] < time()) {
                    try {
                        // Make the refresh proccess
                        $refresh = $meli->refreshAccessToken();

                        // Now we create the sessions with the new parameters
                        $_SESSION['access_token'] = $refresh['body']->access_token;
                        $_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
                        $_SESSION['refresh_token'] = $refresh['body']->refresh_token;
                    } catch (Exception $e) {
                        echo "Exception: ",  $e->getMessage(), "\n";
                    }
                }
            }

            $dados = ['sessao' => $_SESSION, 'link' => ""];
            return $dados;
        } else {
            $dados['link'] = $meli->getAuthUrl($redirectURI, Meli::$AUTH_URL[$siteId]);
            return $dados;
        }
    }

    public static function getData($appId, $secretKey)
    {
        $meli = new Meli($appId, $secretKey);
        $response = $meli->get('/users/me', array('access_token' => $_SESSION['access_token']));
        return $response;
    }

    public static function createTeste($appId, $secretKey)
    {
        $url = '/users/test_user';
        $params = array('access_token' => $_SESSION['access_token']);
        $body = array("site_id" => "MLB");
        $meli = new Meli($appId, $secretKey);
        $resp = $meli->post($url, $body, $params);
        // print_r($resp);
    }

    public static function getInfo($appId, $secretKey)
    {
        $info = new User();

        $id = MeliHandler::getData($appId, $secretKey);
        $id = $id['body']->id;
        $url = "users/$id/mercadopago_account/balance";
        $params = array('access_token' => $_SESSION['access_token']);

        $meli = new Meli($appId, $secretKey);
        $saldo = $meli->get($url, $params);
        $info->saldoDisponivel = $saldo['body']->available_balance; 
        $info->saldoIndisponivel = $saldo['body']->unavailable_balance;

        $url = "orders/search";
        $params = array('seller' => 43441356, 'access_token' => $_SESSION['access_token']);
        $venda = $meli->get($url, $params);


        $url = "questions/search";
        $perguntas = $meli->get($url, $params);
        $totPergunta = 0;
        foreach ($perguntas['body']->questions as $key => $value) {
            
            if ($value->status == 'unanswered') {
                ++$totPergunta;
            }
        }
        
        $info->perguntas = $totPergunta;
        
        return $info;
    }
}
