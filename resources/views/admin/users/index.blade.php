<x-layout>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Error!",
                text: "{{ implode(', ', $errors->all()) }}",
                icon: "error"
            });
        </script>
    @endif

    <div class="container mx-auto p-6 bg-white dark:bg-gray-800  ">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <button {{-- onclick="window.location.href='{{ route('configuration') }}'" --}}
                    class="flex items-center px-4 py-2 bg-gray-200  dark:bg-gray-700 text-gray-700 rounded-full hover:bg-gray-300 transition duration-200 ease-in-out">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </button>
                <h1 class="ml-4 text-2xl font-semibold text-gray-900 dark:text-white">Kelola Pengguna</h1>
            </div>
            <button id="addButton" data-modal-target="addModal" data-modal-toggle="addModal"
                class="flex items-center px-4 py-2 bg-blue-500 rounded-lg text-white text-xs hover:bg-blue-600 transition duration-200 ease-in-out">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Tambah Pengguna
            </button>
        </div>

        {{-- <x-modal-view id="addModal">
            <!-- Modal content -->
            <div class="relative  bg-white w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 dark:bg-gray-800">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tambah</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="addModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('admin.users-store') }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama*</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email*</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            value="{{ old('email') }}" required autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- NIP -->
                    <div class="mb-4">
                        <label for="nip"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP/NIK*</label>
                        <input type="text" id="nip" name="nip"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            value="{{ old('nip') }}" required autocomplete="off">
                        <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <label for="role"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role*</label>
                        <select id="role" name="role"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            required autocomplete="off">
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>Super
                                Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password*</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            Minimal 8 karakter.
                        </p>
                    </div>

                    <div class="mb-4">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            * Wajib diisi.
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-500">
                            SIMPAN
                        </button>
                    </div>
                </form>
            </div>
        </x-modal-view> --}}

        <!-- Filter and Search Section -->
        <div class="mb-6">
            <!-- Filter by Role -->
            <form method="GET" action="{{ route('admin.manage.users.index') }}" class="flex gap-4 mb-4"
                id="role-search-form">
                <select name="role" id="role-select"
                    class="border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    <option value="">All Roles</option>
                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>

                <!-- Search Bar -->
                <div class="relative w-full">
                    <input type="text" name="search"
                        class="w-full rounded-md border-gray-300 py-2 px-4 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        placeholder="Cari berdasarkan nama atau email" value="{{ request('search') }}">
                    <button type="submit"
                        class="absolute inset-y-0 right-0 px-4 bg-gray-200 text-gray-600 hover:bg-gray-300 rounded-r-md dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700">
                        Cari
                    </button>
                </div>
            </form>

            <script>
                document.getElementById('role-select').addEventListener('change', function() {
                    document.getElementById('role-search-form').submit();
                });
            </script>

        </div>

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg dark:bg-gray-600  whitespace-nowrap">
                <thead>
                    <tr
                        class="bg-gray-100 text-left text-gray-600 dark:bg-gray-700 dark:text-gray-100 uppercase text-xs">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ ucwords(str_replace('_', ' ', $user->role)) }}</td>
                            <td class="px-4 py-2">

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
</x-layout>
