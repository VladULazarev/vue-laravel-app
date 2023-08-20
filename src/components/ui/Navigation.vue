<template>
  <div class="fixed top-0 w-full shadow-sm z-10">
    
    <nav class="
      bg-white 
      max-w-[1140px] mx-auto 
      border-gray-200">
      <div class="
        max-w-screen-xl mx-auto 
        flex flex-wrap items-center justify-between 
        p-6"
      >
        <a href="/" class="flex items-center">
            <img src="@/assets/logo.png" class="h-8 mr-3" alt="Vue Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">
              {{ $store.state.appName }}
            </span>
        </a>
        <div class="w-full md:block md:w-auto" id="navbar-default">
          <ul class="
            font-medium flex flex-col 
            p-4 md:p-0 mt-4 border border-gray-100 
            rounded-lg bg-gray-50 md:flex-row md:space-x-8 
            md:mt-0 md:border-0 md:bg-white 
          ">
            <li>
              <RouterLink to="/" 
                active-class="text-teal-600" 
                class="
                  block py-2 pl-3 pr-4 
                  text-gray-900 rounded 
                  hover:bg-gray-100 md:hover:bg-transparent 
                  md:border-0 md:hover:text-teal-600 md:p-0"
              >
              Главная
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/posts" 
                active-class="text-teal-600" 
                class="
                  block py-2 pl-3 pr-4 
                  text-gray-900 rounded 
                  hover:bg-gray-100 md:hover:bg-transparent 
                  md:border-0 md:hover:text-teal-600 md:p-0"
              >
              Блог
              </RouterLink>
            </li>
            <li>
              <RouterLink to="/contact" 
                active-class="text-teal-600" 
                class="
                main-link block py-2 pl-3 pr-4 
                text-gray-900 rounded 
                hover:bg-gray-100 md:hover:bg-transparent 
                md:border-0 md:hover:text-teal-600 
                md:p-0"
              >
              Контакты
              </RouterLink>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  </div>
</template>