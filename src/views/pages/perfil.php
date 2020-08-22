<?php $render('header'); ?>
<div class="profile">
        <div class="date-info">
            <h2>Perfil</h2>

            <div class="input">
                <div class="linha1">
                    <div class="one1">
                        <label>Nome de Usúario:</label> <br>
                        <input id="input" type="text" name="nome_usuario" disabled value="<?=mb_strtoupper($data->nomeUsuario, 'UTF-8');?>">
                    </div>
                    <div class="thu1">
                        <label>E-mail</label> <br>
                        <input id="input" type="text" name="email" disabled value="<?=mb_strtoupper($data->email, 'UTF-8');?>">
                    </div>
                </div>

                <div class="linha1">
                    <div class="one1">
                        <label>Nome:</label> <br>
                        <input type="text" name="nome" id="input"  disabled value="<?=mb_strtoupper($data->nome, 'UTF-8');?>">
                    </div>
                    <div class="thu1">
                        <label>Sobrenome:</label> <br>
                        <input type="text" name="sobrenome" id="input" disabled value="<?=mb_strtoupper($data->sobreNome, 'UTF-8');?>">
                    </div>
                </div>

                <div class="linha3">
                    <div class="one3">
                        <label>Endereço:</label> <br>
                        <input type="text" name="endereco" id="input" disabled value="<?=mb_strtoupper($data->endereco, 'UTF-8');?>">
                    </div>
                </div>

                <div class="linha1">
                    <div class="one1">
                        <label>Cidade:</label> <br>
                        <input type="text" name="cidade" id="input" disabled value="<?=mb_strtoupper($data->cidade, 'UTF-8');?>">
                    </div>
                    <div class="one1">
                        <label>Estado:</label> <br>
                        <input type="text" name="estado" id="input" disabled value="<?=mb_strtoupper($data->estado, 'UTF-8');?>">
                    </div>
                    <div class="one1">
                        <label>CEP:</label> <br>
                        <input type="text" name="cep" id="input" disabled value="<?=mb_strtoupper($data->cep, 'UTF-8');?>">
                    </div>
                </div>
                
            </div>
        </div>

        <div class="profile-edit">
            <div class="fundo">
                
            </div>
            <div class="foto">
                <img src="<?=$data->img;?>" width="200" height="100">
            </div>
            <div class="infor">
                <h3><?=$data->nome ." ". $data->sobreNome;?></h3>
                <label>CPF: <?=$data->cpf;?></label><br>
                <label>Contato: <?=$data->code ." ". $data->fone;?></label>
            </div>
        </div>
    </div>

<?php $render('footer'); ?>