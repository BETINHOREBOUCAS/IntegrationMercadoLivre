<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base; ?>/css/all.css">
    <link rel="stylesheet" href="<?= $base; ?>/css/login.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Login</title>
</head>

<body style="margin: 0;">
    <div class="container">
        <div class="box"></div>

        <div class="box2"></div>

        <div class="cadastro">
            <div class="slogan">
                <div class="icon">
                    <i class="far fa-handshake"></i>
                </div>

                <div class="text">
                    Business Integration
                </div>

            </div>
            <div>
                <h1>Cadastro</h1>
            </div>
            <?php if ($error == 'sucesso') : ?>
            <div class="resposta">

                <div class="sucesso">
                    <?= $aviso; ?> <a href="<?= $base; ?>/login">Faça login!</a>
                </div>
            </div>
            <?php elseif ($error == 'error') : ?>
            <div class="resposta">
                <div class="error">
                    <?= $aviso; ?>
                </div>

            </div>
            <?php endif ?>


            <br>

            <div class="form">
                <form method="post" action="<?= $base; ?>/cadastro">

                    <input type="text" name="nome" id="input" placeholder="NOME COMPLETO"> <br><br>

                    <input type="email" name="email" id="input" placeholder="E-MAIL CADASTRADO NO ML"> <br><br>

                    <input type="text" name="appId" id="input" placeholder="APPID"> <br><br>

                    <input type="text" name="secretKey" id="input" placeholder="SECRETKEY"> <br><br>

                    <select name="pais" id="input">
                        <option value="">Escolha o País</option>
                        <option value="MLB">Brasil</option>
                        <option value="MLA">Argentina</option>
                        <option value="MCO">Colômbia</option>
                        <option value="MCR">Costa Rica</option>
                        <option value="MEC">Equador</option>
                        <option value="MLC">Chile</option>
                        <option value="MLM">México</option>
                        <option value="MLU">Uruguai</option>
                        <option value="MLV">Venezuela</option>
                        <option value="MPA">Panamá</option>
                        <option value="MPE">Peru</option>
                        <option value="MPT">Portugal</option>
                        <option value="MRD">República Dominicana</option>
                    </select> <br><br>

                    <input type="password" name="senha" id="input" placeholder="CRIE UMA SENHA"> <br><br>

                    <input type="password" name="senha2" id="input" placeholder="CONFIRME SUA SENHA"> <br><br>

                    <input type="submit" value="CADASTRAR" id="botao_entrar"> <br><br>
                </form>
                <a href="<?= $base; ?>/login">Já é cadastrado? Faça login</a>
            </div>

        </div>


    </div>

</body>

</html>