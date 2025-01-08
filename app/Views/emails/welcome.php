<!DOCTYPE html>
<html>

<head>
  <title>Bem-vindo à Peres Imóveis</title>
</head>

<body>
  <h2>Olá <?= $username ?>,</h2>

  <p>Seja bem-vindo à Peres Imóveis! Estamos muito felizes em ter você conosco.</p>

  <p>Com sua conta você pode:</p>
  <ul>
    <li>Visualizar imóveis exclusivos</li>
    <li>Salvar seus imóveis favoritos</li>
    <li>Receber notificações de novos imóveis</li>
  </ul>

  <p>Para acessar sua conta, clique no link abaixo:</p>
  <a href="<?= base_url('public/login') ?>" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Acessar minha conta</a>

  <p>Atenciosamente,<br> <b> Equipe Peres Imóveis </b></p>
</body>

</html>