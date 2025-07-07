@extends('layouts.app')

@section('title', 'Login - Jobseeker Platform')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md space-y-8">
        <div>
            <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
                Jobseeker Platform
            </h2>
        </div>
        <form class="mt-8 space-y-6" id="loginForm" action="{{ route('login.action') }}" method="POST" data-redirect-url="{{ route('dashboard') }}">
            @csrf
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="id_card_number" class="sr-only">ID Card Number</label>
                    <input id="id_card_number" name="id_card_number" type="text" required
                        class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="ID Card Number">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required
                        class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
