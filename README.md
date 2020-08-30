## Instalação
Você pode clonar este repositório OU baixar o .zip

## Configuração
No arquivo **config.php** utilize os dados do seu banco de dados e configure o seu URL base.

Crie uma conta no Mercado Livre, caso já possua faça login.

Entre no site **https://developers.mercadolivre.com.br/** clique em começar agora.

Clique em Ir a vincular minha conta evalide seus dados.

Agora clique Minhas Aplicações e Criar Nova Aplicação.

Preencha todas as informações que são solicitadas e clique em continuar.

Em URI de redirect coloque sua url para que após a validação o ML redirecione para o seu site.

Em escopos apenas duas informações não devem ser marcadas ORDERS_V2 e SHIPMENTS.

Em URL de retornos de chamada de notificação coloque um URL válido o memso não aceita localhost. (OBS: Esse url não está sendo usado nessa aplicação.)

Após os passos acima ter sido concluidos irá gerar um ID do Aplicativo e SecretKey. (Utilize essas informações para se cadastrar na aplicação).

Ao acessar aparacer um erro no UserController linhas 36. Para corrigir faça uma verificação ou coloque uma imagem no perfil da conta do ML.

OBS: Na página de vendas e em menu no campo venda não está configurado ainda. Por tanto não irá funcionar.
