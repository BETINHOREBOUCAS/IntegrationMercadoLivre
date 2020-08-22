<?php $render('header'); ?>

<section class="info">

    <div class="resp">
        <div class="saldo">
            <div class="icons" id="icon1">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="text">
                <div class="desc">Saldo Disponível</div>
                <div class="resul">R$ <?=$info->saldoDisponivel;?></div>
            </div>
        </div>

        <div class="liberar">
            <div class="icons" id="icon2">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="text">
                <div class="desc">Saldo à Liberar</div>
                <div class="resul">R$ <?=$info->saldoIndisponivel;?></div>
            </div>
        </div>
    </div>

    <div class="resp">
        <div class="vendas">
            <div class="icons" id="icon3">
                <i class="fas fa-handshake"></i>
            </div>
            <div class="text">
                <div class="desc">Vendas</div>
                <div class="resul">10</div>
            </div>
        </div>

        <div class="vendas">
            <div class="icons" id="icon4">
            <i class="fas fa-question-circle"></i>
            </div>
            <div class="text">
                <div class="desc">Perguntas</div>
                <div class="resul"><?=$info->perguntas;?></div>
            </div>
        </div>
    </div>



</section>

<section class="grafico">

    <div style="width: 100%; text-align: center; display: inline-block;">
        <div class="abc">
            <canvas id="canvas2"></canvas>
        </div>

    </div>
    
</section>

<?php $render('footer'); ?>