<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - Jobseeker Platform')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800">
            <div class="h-16 flex items-center px-6">
                <h1 class="text-xl font-semibold text-white">Admin Panel</h1>
            </div>
            <nav class="mt-5 px-3">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }} text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    <svg class="mr-3 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.validations.index') }}" class="{{ request()->routeIs('admin.validations.*') ? 'bg-indigo-900' : 'hover:bg-indigo-700' }} text-white group flex items-center px-2 py-2 text-base font-medium rounded-md mt-1">
                    <svg class="mr-3 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Validations
                </a>
            </nav>
            <div class="px-3 mt-10">
                <div class="pt-4 pb-3 border-t border-indigo-700">
                    <div class="flex items-center px-2">
                        <div>
                            <div class="text-base font-medium text-white">{{ Session::get('admin_name') }}</div>
                            <div class="text-sm font-medium text-indigo-300">{{ ucfirst(Session::get('admin_role')) }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left block px-2 py-2 text-base font-medium text-white hover:bg-indigo-700 rounded-md">
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Header -->
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <h1 class="text-xl font-semibold text-gray-900">Jobseeker Platform</h1>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-700 mr-4">{{ Session::get('admin_name') }} ({{ ucfirst(Session::get('admin_role')) }})</span>
                            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
