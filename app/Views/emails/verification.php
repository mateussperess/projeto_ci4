<!DOCTYPE html>
<html>

<head>
  <title>Verificação de Email</title>
</head>

<body>
  <h2>Olá <?= $username ?>,</h2>
  <p>Bem-vindo à Peres Imóveis! Por favor, verifique seu email clicando no link abaixo:</p>
  <a href="<?= base_url('verify-email/' . $token) ?>">Verificar Email</a>
</body>

</html>