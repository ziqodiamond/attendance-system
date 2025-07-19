     <header class="bg-white shadow-sm dark:bg-gray-800 h-16 fixed right-0 left-0 md:left-64 z-21">
         <div class="h-full px-6 flex items-center justify-between">
             <div>
                 <!-- Left side with Sidebar Toggle for Mobile -->
                 <button @click="sidebarOpen = !sidebarOpen"
                     class="md:hidden flex items-center justify-center h-10 w-10 text-gray-500 hover:bg-gray-100 rounded-md dark:text-gray-200 dark:hover:bg-gray-700 focus:outline-none">
                     <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 6h16M4 12h16M4 18h16"></path>
                     </svg>
                 </button>
             </div>


             <!-- Right side with User actions -->
             <div class="flex items-center space-x-4">
                 <!-- Search Bar -->
                 <div class="relative md:w-64">
                     <input
                         class="w-full h-10 pl-10 pr-4 rounded-lg text-sm bg-gray-100 dark:bg-gray-700 border-none focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-200"
                         type="text" placeholder="Search...">
                     <div class="absolute left-0 top-0 mt-3 ml-3 text-gray-400">
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                         </svg>
                     </div>
                 </div>

                 <!-- Dark Mode Toggle -->
                 <button @click="toggleDarkMode()"
                     class="relative h-10 w-10 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                     <!-- Sun icon -->
                     <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         x-cloak>
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                         </path>
                     </svg>
                     <!-- Moon icon -->
                     <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         x-cloak>
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                         </path>
                     </svg>
                 </button>

                 <!-- Notifications dropdown -->
                 <div x-data="{ notifOpen: false }" class="relative">
                     <button @click="notifOpen = !notifOpen"
                         class="relative h-10 w-10 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                             </path>
                         </svg>
                         <span
                             class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border border-white dark:border-gray-700"></span>
                     </button>

                     <div x-show="notifOpen" @click.away="notifOpen = false"
                         class="absolute right-0 w-80 p-2 mt-2 space-y-2 text-gray-600 bg-white rounded-lg shadow-lg dark:text-gray-300 dark:bg-gray-700"
                         x-cloak>
                         <div class="px-4 py-2 flex items-center justify-between border-b dark:border-gray-600">
                             <p class="text-sm font-semibold">{{ __('Notifications') }}</p>
                             <a href="#"
                                 class="text-xs text-indigo-500 hover:underline">{{ __('Mark all as read') }}</a>
                         </div>
                         <a href="#"
                             class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-lg transition-colors">
                             <div class="flex-shrink-0 bg-indigo-100 dark:bg-indigo-900/30 rounded-full p-2">
                                 <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                     </path>
                                 </svg>
                             </div>
                             <div class="ml-3">
                                 <p class="text-sm font-medium">{{ __('New message from John') }}</p>
                                 <p class="text-xs text-gray-500 dark:text-gray-400">
                                     {{ __('15 minutes ago') }}</p>
                             </div>
                         </a>
                         <a href="#"
                             class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-lg transition-colors">
                             <div class="flex-shrink-0 bg-green-100 dark:bg-green-900/30 rounded-full p-2">
                                 <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                 </svg>
                             </div>
                             <div class="ml-3">
                                 <p class="text-sm font-medium">{{ __('Task completed') }}</p>
                                 <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('1 hour ago') }}
                                 </p>
                             </div>
                         </a>
                         <div class="px-4 py-2 border-t dark:border-gray-600">
                             <a href="#"
                                 class="text-xs text-indigo-500 hover:underline block text-center">{{ __('View all notifications') }}</a>
                         </div>
                     </div>
                 </div>

                 <!-- Profile dropdown -->
                 <div x-data="{ profileOpen: false }" class="relative">
                     <button @click="profileOpen = !profileOpen" class="flex items-center">
                         <img class="w-10 h-10 rounded-full border-2 border-transparent hover:border-indigo-500 transition-colors"
                             src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"
                             alt="{{ Auth::user()->name }}">
                     </button>

                     <div x-show="profileOpen" @click.away="profileOpen = false"
                         class="absolute right-0 w-60 mt-2 py-2 bg-white rounded-lg shadow-lg dark:bg-gray-700" x-cloak>
                         <div class="px-4 py-3 border-b dark:border-gray-600">
                             <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                 {{ Auth::user()->name }}</p>
                             <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}
                             </p>
                         </div>
                         <a href="{{ route('profile.edit') }}"
                             class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                             <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                 </path>
                             </svg>
                             {{ __('Profile') }}
                         </a>
                         <a href="#"
                             class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                             <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                 </path>
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                             </svg>
                             {{ __('Account Settings') }}
                         </a>
                         <div class="border-t dark:border-gray-600 mt-2">
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <button type="submit"
                                     class="flex items-center w-full px-4 py-2 text-sm text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600">
                                     <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                         </path>
                                     </svg>
                                     {{ __('Log Out') }}
                                 </button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </header>
