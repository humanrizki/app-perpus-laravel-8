{{-- 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active fw-bold':'';}}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ (request()->is('collections*')) ? 'active fw-bold':'';}}" href="/collections">Collections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('lists*')) ? 'active fw-bold':'';}}" href="/lists">Book lists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('bucket*')) ? 'active fw-bold':'';}}" href="/bucket">Bucket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('loan*')) ? 'active fw-bold':'';}}" href="/loan">Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('transaction*')) ? 'active fw-bold':'';}}" href="/transaction">Transaction</a>
          </li>
        </ul>
        @auth
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <form action="/logout" method="POST">
              @csrf
              <li class="dropdown-item"><button class="btn btn-danger w-100" type="submit">Logout</button></li>
            </form>
          </ul>
        </div>
        @else    
        <div class="container-login">
            <a href="/login" class="btn btn-success">Login</a>
        </div>
        @endauth
      </div>
    </div>
  </nav> --}}
  <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5  dark:bg-gray-800 border">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="#" class="flex">
      <svg class="mr-3 h-10" viewBox="0 0 52 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.87695 53H28.7791C41.5357 53 51.877 42.7025 51.877 30H24.9748C12.2182 30 1.87695 40.2975 1.87695 53Z" fill="#76A9FA"/><path d="M0.000409561 32.1646L0.000409561 66.4111C12.8618 66.4111 23.2881 55.9849 23.2881 43.1235L23.2881 8.87689C10.9966 8.98066 1.39567 19.5573 0.000409561 32.1646Z" fill="#A4CAFE"/><path d="M50.877 5H23.9748C11.2182 5 0.876953 15.2975 0.876953 28H27.7791C40.5357 28 50.877 17.7025 50.877 5Z" fill="#1C64F2"/></svg>
        <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">Library CN</span>
    </a>
    <div class="flex md:order-2">
        {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button> --}}
        
        @auth
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ auth()->user()->name }}<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

        <!-- Dropdown menu -->
      <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
          <ul class="py-1" aria-labelledby="dropdownButton">
            
              <a href="/profile" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-left">Logout</button>
              </form>
            </li>
          </ul>
      </div>
        @else 
        <a href="/login" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login!</a>   
        @endauth
        <button data-collapse-toggle="mobile-menu-4" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-4" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
    
    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
      <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
        <li>
          <a href="/" class="block py-2 pr-4 pl-3 {{ (request()->is('/')) ? 'bg-blue-700 md:bg-transparent md:text-blue-700 rounded text-white' : 'md:text-gray-700 sm:text-gray-700 sm:border-gray-100 hover:bg-gray-50 md:border-0 md:hover:bg-transparent' }}  md:p-0 dark:text-white" aria-current="page">Home</a>
        </li>
        <li>
          <a href="/lists" class="block py-2 pr-4 pl-3 {{ (request()->is('lists*')) ? 'bg-blue-700 md:bg-transparent md:text-blue-700 rounded text-white' : 'md:text-gray-700 sm:text-gray-700 sm:border-gray-100 hover:bg-gray-50 md:border-0 md:hover:bg-transparent' }}  md:p-0 dark:text-white" aria-current="page">Lists</a>
        </li>
        <li>
          <a href="/collections" class="block py-2 pr-4 pl-3 {{ (request()->is('collections*')) ? 'bg-blue-700 md:bg-transparent md:text-blue-700 rounded text-white' : 'md:text-gray-700 sm:text-gray-700 sm:border-gray-100 hover:bg-gray-50 md:border-0 md:hover:bg-transparent' }}  md:p-0 dark:text-white" aria-current="page">Collections</a>
        </li>
        <li>
          <a href="/loan" class="block py-2 pr-4 pl-3 {{ (request()->is('loan*')) ? 'bg-blue-700 md:bg-transparent md:text-blue-700 rounded text-white' : 'md:text-gray-700 sm:text-gray-700 sm:border-gray-100 hover:bg-gray-50 md:border-0 md:hover:bg-transparent' }}  md:p-0 dark:text-white" aria-current="page">Loans</a>
        </li>
        <li>
          <a href="/bucket" class="block py-2 pr-4 pl-3 {{ (request()->is('bucket*')) ? 'bg-blue-700 md:bg-transparent md:text-blue-700 rounded text-white' : 'md:text-gray-700 sm:text-gray-700 sm:border-gray-100 hover:bg-gray-50 md:border-0 md:hover:bg-transparent' }}  md:p-0 dark:text-white" aria-current="page">Bucket</a>
        </li>
        <li>
          <a href="/transaction" class="block py-2 pr-4 pl-3 {{ (request()->is('transaction*')) ? 'bg-blue-700 md:bg-transparent md:text-blue-700 rounded text-white' : 'md:text-gray-700 sm:text-gray-700 sm:border-gray-100 hover:bg-gray-50 md:border-0 md:hover:bg-transparent' }}  md:p-0 dark:text-white" aria-current="page">Transactions</a>
        </li>
        
      </ul>
      
    </div>
    
    </div>
  </nav>