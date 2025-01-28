<?php
$requestUri = $_SERVER['REQUEST_URI'];
$string_url = substr($requestUri, 19, 5);
?>

<nav id="nav" class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <!-- Logo Section -->
    <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="<?= base_url('public/img/blue_logo.png') ?>" class="h-14" alt="Peres Imóveis Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Admin Panel</span>
    </a>

    <!-- User Profile Section -->
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <!-- Notifications -->
      <button type="button" class="relative p-2 mr-4" id="notifications-button">
        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">3</span>
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
        </svg>
      </button>

      <!-- Admin Profile -->
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-12 h-12 rounded-full" src="<?= base_url('public/uploads/profile_photos/' . (session()->get('profile_photo') ? esc(session()->get('profile_photo')['file_name']) : 'default.png')) ?>" alt="Admin photo">
      </button>

      <!-- Admin Dropdown Menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white">Administrador</span>
          <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?= esc(session()->get('email')) ?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="<?= base_url('admin/profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perfil</a>
          </li>
          <li>
            <a href="<?= base_url('admin/settings') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Configurações</a>
          </li>
          <li>
            <a href="<?= base_url('admin/logs') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logs do Sistema</a>
          </li>
          <li>
            <a href="<?= base_url('admin/logout') ?>" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sair</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Admin Navigation -->
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-admin">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="<?= base_url('admin/') ?>" class="block py-2 px-3 md:p-0 <?= $string_url == '' ? 'text-blue-700' : 'text-gray-900'?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Dashboard</a>
        </li>
        <li>
          <a href="<?= base_url('admin/users') ?>" class="block py-2 px-3 md:p-0 <?= $string_url == 'users' ? 'text-blue-700' : 'text-gray-900'?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Usuários</a>
        </li>
        <li>
          <a href="<?= base_url('admin/properties') ?>" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Imóveis</a>
        </li>
        <li>
          <a href="<?= base_url('admin/reports') ?>" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Relatórios</a>
        </li>
      </ul>
    </div>
  </div>
</nav>