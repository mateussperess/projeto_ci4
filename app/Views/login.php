<!DOCTYPE html>
<html lang="pt-BR">

<!-- $status['status_code'] -->
<?php if (isset($status) && is_array($status) && $status['status_code'] === 200): ?>
  <div id="alert" role="alert" class="rounded-xl border border-gray-100 bg-white p-4 mb-4 fixed inset-0 flex items-center justify-center z-50">
    <div class="flex items-start gap-4">
      <span class="text-green-600">
        <img src="<?php echo base_url('../../assets/icons/check.png'); ?>" alt="Success" class="w-10 h-10">
      </span>

      <div class="flex-1">
        <strong class="block font-medium text-gray-900">Cadastro realizado com sucesso!</strong>
        <p class="mt-1 text-sm text-gray-700">Faça o login com sua conta!</p>
      </div>

      <button class="text-gray-500 transition hover:text-gray-600" onclick="this.closest('[role=alert]').remove()">
        <span class="sr-only">Dismiss popup</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
<?php endif; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">

  <style>
    h1,
    label,
    span,
    p {
      user-select: none;
    }
  </style>
</head>

<body>
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
        <img class="w-8 h-8 mr-2" src="../assets/img/logos/62.png" alt="logo">
        Peres Imóveis
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Faça login em sua conta
          </h1>
          <form class="space-y-4 md:space-y-6" action="/login" method="post">
            <div>
              <label for="mail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
              <input type="email" name="mail" id="mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <div class="text-red-600 text-sm" id="email-error"></div>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
              <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500 dark:text-gray-300">Lembrar-me</label>
                </div>
              </div>
              <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Esqueceu sua senha?</a>
            </div>

            <button type="submit" class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
              Login
            </button>

            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Não tem uma conta? <a href="register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Cadastre-se!</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script>
    function removeAlert() {
      const alertBox = document.getElementById('alert');
      setTimeout(() => {
        alertBox.parentElement.remove();
        window.location.href = 'login';
      }, 5000);
    }

    setTimeout(removeAlert, 0);
  </script>
</body>

</html>