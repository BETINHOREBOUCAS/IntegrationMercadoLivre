<?php $render('header'); ?>

<div class="list">
    <?php if (!empty($produtos['produtosAtivos']) || !empty($produtos['produtosAtivos'])) : ?>
        <div style="margin-bottom: 50px;">
            <!--
                <select name="situação" id="input">
                <option value="">Ativos</option>
                <option value="">Inativos</option>
            </select>
            <br><br>
    -->
            
                <table class="tabela">
                
                <tbody>

                    <?php if (!empty($produtos['produtosAtivos'])) : ?>
                        <?php foreach ($produtos['produtosAtivos'] as $produto) : ?>

                            <tr>
                                <td style="text-align: center;"><img src="<?= $produto['thumbnail']; ?>" id="img_prod"></td>
                                <td><?= $produto['title']; ?> <br><br> <?= $produto['visitas']; ?> visitas | <?= $produto['quantidade']; ?> estoque</td>
                                
                                <td style="width: 15%;">R$ <?= $produto['price']; ?></td>
                                <td  style="color: green; font-weight: bold; width: 10%;">Ativo</td>
                                <td style="width: 10%;"><i class="fas fa-power-off" style="color: red;" title="Desativar"></i> | <i class="fas fa-edit" style="color: orange;" title="Editar"></i></td>
                            </tr>

                        <?php endforeach ?>
                    <?php endif ?>

                    <?php if (!empty($produtos['produtosInativos'])) : ?>
                        <?php foreach ($produtos['produtosInativos'] as $produto) : ?>

                            <tr>
                            <td style="text-align: center;"><img src="<?= $produto['thumbnail']; ?>" id="img_prod"></td>
                                <td><?= $produto['title']; ?> <br><br> <?= $produto['visitas']; ?> visitas | <?= $produto['quantidade']; ?> estoque</td>
                                
                                <td style="width: 15%;">R$ <?= $produto['price']; ?></td>
                                <td style="color: red; font-weight: bold; width: 10%;">
                                <?php if($produto['status'] == 'closed') {
                                    echo "Inativo";
                                } else if ($produto['status'] == 'paused') {
                                    echo "Pausado";
                                } else {
                                    echo "Desabilitado";
                                }
                                ?>
                                </td>
                                <td style="width: 10%;"><i class="fas fa-power-off" style="color: green;" title="Ativar"></i> | <i class="fas fa-edit" style="color: orange;" title="Editar"></td>
                            </tr>

                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
            
            
        </div>
    <?php else : ?>
        <div>Sem produtos ativos</div>
    <?php endif ?>
</div>

<?php $render('footer'); ?>