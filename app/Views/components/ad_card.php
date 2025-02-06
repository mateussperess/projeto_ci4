<div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300 group">
  <div class="relative">
    <img
      src="<?php
            $requestUri = $_SERVER['REQUEST_URI'];
            if (str_contains($requestUri, 'houses')) {
              echo base_url('public/uploads/property_photos/' . $house['main_photo']);
            } elseif (str_contains($requestUri, 'apartments')) {
              echo base_url('public/uploads/property_photos/' . $apartment['main_photo']);
            } elseif (str_contains($requestUri, 'lands')) {
              echo base_url('public/uploads/property_photos/' . $land['main_photo']);
            }
            ?>"
      alt="<?php
            if (str_contains($requestUri, 'houses')) {
              echo esc($house['title']);
            } elseif (str_contains($requestUri, 'apartments')) {
              echo esc($apartment['title']);
            } elseif (str_contains($requestUri, 'lands')) {
              echo esc($land['title']);
            }
            ?>"
      class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">

    <span class="absolute top-4 right-4 bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
      <?php
      if (str_contains($requestUri, 'houses')) {
        echo $house['transaction_type'] === 'sale' ? 'Venda' : 'Aluguel';
      } elseif (str_contains($requestUri, 'apartments')) {
        echo $apartment['transaction_type'] === 'sale' ? 'Venda' : 'Aluguel';
      } elseif (str_contains($requestUri, 'lands')) {
        echo $land['transaction_type'] === 'sale' ? 'Venda' : 'Aluguel';
      }
      ?>
    </span>
  </div>

  <div class="p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition">
      <?php
      if (str_contains($requestUri, 'houses')) {
        echo esc($house['title']);
      } elseif (str_contains($requestUri, 'apartments')) {
        echo esc($apartment['title']);
      } elseif (str_contains($requestUri, 'lands')) {
        echo esc($land['title']);
      }
      ?>
    </h3>

    <p class="text-gray-600 mb-4 line-clamp-2">
      <?php
      if (str_contains($requestUri, 'houses')) {
        echo esc($house['description']);
      } elseif (str_contains($requestUri, 'apartments')) {
        echo esc($apartment['description']);
      } elseif (str_contains($requestUri, 'lands')) {
        echo esc($land['description']);
      }
      ?>
    </p>

    <div class="flex flex-wrap gap-4 mb-4">
      <span class="flex items-center text-gray-600">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <?php
        if (str_contains($requestUri, 'houses')) {
          echo $house['total_area'];
        } elseif (str_contains($requestUri, 'apartments')) {
          echo $apartment['total_area'];
        } elseif (str_contains($requestUri, 'lands')) {
          echo $land['total_area'];
        }
        ?>m²
      </span>

      <span class="flex items-center text-gray-600">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
        </svg>
        <?php
        if (str_contains($requestUri, 'houses')) {
          echo $house['bedrooms'];
        } elseif (str_contains($requestUri, 'apartments')) {
          echo $apartment['bedrooms'];
        }
        ?> Quartos
      </span>

      <span class="flex items-center text-gray-600">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
        </svg>
        <?php
        if (str_contains($requestUri, 'houses')) {
          echo $house['parking'];
        } elseif (str_contains($requestUri, 'apartments')) {
          echo $apartment['parking'];
        }
        ?> Vagas
      </span>
    </div>

    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
      <span class="text-2xl font-bold text-blue-600">
        R$ <?php
            if (str_contains($requestUri, 'houses')) {
              echo number_format($house['price'], 2, ',', '.');
            } elseif (str_contains($requestUri, 'apartments')) {
              echo number_format($apartment['price'], 2, ',', '.');
            } elseif (str_contains($requestUri, 'lands')) {
              echo number_format($land['price'], 2, ',', '.');
            }
            ?>
      </span>
      <a href="<?php
                if (str_contains($requestUri, 'houses')) {
                  echo base_url('houses/' . $house['id']);
                } elseif (str_contains($requestUri, 'apartments')) {
                  echo base_url('apartments/' . $apartment['id']);
                } elseif (str_contains($requestUri, 'lands')) {
                  echo base_url('lands/' . $land['id']);
                }
                ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        Ver Detalhes
      </a>
    </div>
  </div>
</div>