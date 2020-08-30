<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base; ?>/css/all.css">
    <link rel="stylesheet" href="<?= $base; ?>/css/style.css">
    <link rel="stylesheet" href="<?=$base; ?>/css/profile.css">
    <link rel="stylesheet" href="<?=$base; ?>/css/produtos.css">
    
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Integration ML</title>

    <script src="<?= $base; ?>/js/Chart.min.js"></script>
    <script src="<?= $base; ?>/js/utils.js"></script>
    <script src="<?= $base; ?>/js/script.js"></script>

</head>

<body>
    <div class="dash">
        <div class="dash-barra">
            <div id="code">
                <i class="far fa-handshake"></i>
            </div>
            <div id="text">
                Business Integration
            </div>
        </div>
        <a href="<?=$base;?>/">
            <div id="icon-dash"><i class="far fa-chart-bar"></i> <label>Menu</label></div>
        </a>
        <a href="<?=$base;?>/perfil">
            <div id="icon-dash"><i class="far fa-id-card"></i> <label>Perfil</label></div>
        </a>
        <a href="<?=$base;?>/produtos">
            <div id="icon-dash"><i class="far fa-list-alt"></i> <label>Produtos</label></div>
        </a>
        <a href="<?=$base;?>/vendas">
            <div id="icon-dash"><i class="fas fa-chart-line"></i> <label>Vendas</label></div>
        </a>
    </div>
    <header>

        <div class="barra-menu">
            <div class="logo left">
                <a href="">Dashboard</a>
                <i class="fas fa-tachometer-alt"></i>
                <i class="fas fa-globe-americas">
                    <div id="not">
                        <div>5</div>
                    </div>
                </i>
                <i class="fas fa-search"></i>

            </div>

            <div class="option right">
                <ul class="right">
                    <li>Account</li>
                    <li>Dropdown</li>
                    <a href="<?=$base;?>/sair"><li>Log out</li></a>
                </ul>
            </div>

            <div class="option-mobile">
                <div class="icons">
                    <i class="far fa-user-circle" style="font-size: 35px;"></i>
                </div>

            </div>
        </div>
    </header>