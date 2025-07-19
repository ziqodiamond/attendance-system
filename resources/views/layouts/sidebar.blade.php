<div>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-800"
        aria-label="Sidebar">
        <!-- Logo Aplikasi di Atas -->
        <div
            class="absolute top-0 left-0 w-full h-28 bg-gray-50 dark:bg-gray-800 flex items-center justify-center p-4 mb-5">
            <x-application-logo
                class=" px-2 grid h-24 w-full object-cover fill-current place-content-center rounded-lg bg-gray-200 dark:bg-gray-300 text-gray-600"></x-application-logo>
        </div>


        <div class="h-full overflow-y-auto px-3  pt-28 pb-24"> <!-- Sesuaikan padding bawah -->
            <ul class="space-y-2 font-medium">
                <!-- Menu Utama -->
                <li class="font-bold text-xs text-gray-500 dark:text-white">MENU UTAMA</li>
                <li>

                    <x-navlink :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </x-navlink>
                </li>

                <li>

                    <x-navlink :active="request()->routeIs('attendance.index')" href="{{ route('attendance.index') }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">attendance</span>
                    </x-navlink>
                </li>



                @if (Auth::check() && Auth::user()->role == 'admin')
                    {{-- laporan data --}}
                    <li class="font-bold text-xs text-gray-500 dark:text-white">MENU ADMIN</li>
                    <li x-data="{ open: false }" class="relative">
                        <div class="flex items-center justify-between">
                            <x-navlink :active="request()->routeIs('admin.reports.index')" href="{{ route('admin.reports.index') }}">
                                <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.293l-2-2a1 1 0 0 0-1.414 1.414l.293.293h-6.586a1 1 0 1 0 0 2h6.586l-.293.293A1 1 0 0 0 18 16.707l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Attendance Report</span>
                            </x-navlink>
                            <!-- Ikon panah -->
                            <button @click.prevent="open = !open" class="ml-auto transform transition-transform">
                                <svg x-show="!open" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                                <svg x-show="open" x-cloak class="w-4 h-4 rotate-180"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Dropdown anak menu -->
                        <ul x-show="open" x-cloak class="space-y-1 pl-8 mt-1">
                            <li>
                                <x-navlink :active="request()->routeIs('admin.reports.attendance.check-in')" href="{{ route('admin.reports.attendance.check-in') }}">
                                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Check-in Report</span>
                                </x-navlink>
                            </li>
                            <li>
                                <x-navlink :active="request()->routeIs('admin.reports.attendance.check-out')" href="{{ route('admin.reports.attendance.check-out') }}">
                                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Check-out Report</span>
                                </x-navlink>
                            </li>
                            <li>
                                <x-navlink :active="request()->routeIs('admin.reports.attendance.absent')" href="{{ route('admin.reports.attendance.absent') }}">
                                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Absent Report</span>
                                </x-navlink>
                            </li>

                        </ul>
                    </li>
                @endif

                {{-- CONFIGURATION --}}
                <li class="font-bold text-xs text-gray-500 dark:text-white">KONFIGURASI</li>

                <li>
                    <x-navlink :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                                clip-rule="evenodd" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap">Konfigurasi</span>
                    </x-navlink>
                </li>


            </ul>
        </div>

        <!-- Profil User di Bawah -->
        <div class="absolute bottom-0 left-0 w-full p-4 bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <!-- User Info -->
                <div class="flex items-center space-x-3">
                    <img class="w-10 h-10 rounded-full object-cover"
                        src="{{ Auth::user()->profile_photo_path ? route('profile.photo', basename(Auth::user()->profile_photo_path)) : asset('storage/profile_photos/guest.png') }}"
                        alt="User Profile Picture">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h4>
                        <p class="text-xs text-gray-700 dark:text-gray-300">{{ Auth::user()->role }}</p>
                    </div>
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-red-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>
</div>
