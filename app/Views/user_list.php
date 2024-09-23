<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
  <div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5 text-center">Lista de Usuários</h1>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nome</th>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ações</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach ($usuarios as $usuario): ?>
            <tr class="hover:bg-gray-100">
              <td class="py-2 px-4 border-b"><?= esc($usuario['id']); ?></td>
              <td class="py-2 px-4 border-b"><?= esc($usuario['first_name']); ?></td>
              <td class="py-2 px-4 border-b"><?= esc($usuario['mail']); ?></td>
              <td class="py-2 px-4 border-b">
                <!-- Ações, como editar ou excluir -->
                <a href="/usuarios/edit/<?= esc($usuario['id']); ?>" class="text-blue-500 hover:text-blue-700">Editar</a>
                <a href="/usuarios/delete/<?= esc($usuario['id']); ?>" class="text-red-500 hover:text-red-700">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>