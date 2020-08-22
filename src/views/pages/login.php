<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base; ?>/css/all.css">
    <link rel="stylesheet" href="<?= $base; ?>/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body style="margin: 0;">
    <div class="container">
        <div class="box"></div>

        <div class="box2"></div>

        <div class="login">
            <div class="slogan">
                <div class="icon">
                    <i class="far fa-handshake"></i>
                </div>

                <div class="text">
                    Business Integration
                </div>

            </div>
            <div>
                <h1>Login</h1>
            </div>
            <?php if ($error == 'error') : ?>
                <div class="resposta">

                    <div class="error">
                        <?= $aviso; ?>
                    </div>

                </div>
            <?php endif ?> <br>
            <div class="form">
                <form method="post" action="<?= $base; ?>/login">
                    <input type="email" name="email" id="input" placeholder="E-MAIL"> <br><br>

                    <input type="password" name="senha" id="input" placeholder="SENHA"> <br><br>

                    <input type="submit" value="ENTRAR" id="botao_entrar"> <br><br>
                </form>
                <div>
                    <a href="<?= $base; ?>/cadastro"><button id="botao_cadastrar">CADASTRE-SE</button></a>
                </div>
            </div>

        </div>


    </div>

</body>

</html>