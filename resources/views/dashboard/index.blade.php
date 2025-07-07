@extends('layouts.app')

@section('title', 'Dashboard - Jobseeker Platform')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900">Jobseeker Platform</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Session::get('society_name') }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen bg-white shadow-sm">
            <nav class="px-2 mt-5">
                <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-900 bg-gray-100 rounded-md group">
                    Dashboard
                </a>
                <a href="{{ route('validation.index') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group">
                    My Data Validation
                </a>
                <a href="{{ route('job-vacancies.index') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group">
                    Job Vacancies
                </a>
                <a href="{{ route('applications.index') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group">
                    My Job Applications
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="mx-auto max-w-7xl">
                <h2 class="mb-6 text-2xl font-bold text-gray-900">Dashboard</h2>

                <!-- Validation Status -->
                <div class="mb-6 overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Data Validation Status</h3>

                        @if($society->validation)
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-500">Status:</span>
                                    <span class="text-sm text-gray-900">
                                        @if($society->validation->status === 'pending')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        @elseif($society->validation->status === 'accepted')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Accepted
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Declined
                                            </span>
                                        @endif
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-500">Job Category:</span>
                                    <span class="text-sm text-gray-900">{{ $society->validation->jobCategory->job_category ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-500">Job Position:</span>
                                    <span class="text-sm text-gray-900">{{ $society->validation->job_position }}</span>
                                </div>
                                @if($society->validation->validator)
                                    <div class="flex justify-between">
                                        <span class="text-sm font-medium text-gray-500">Validator:</span>
                                        <span class="text-sm text-gray-900">{{ $society->validation->validator->name }}</span>
                                    </div>
                                @endif
                                @if($society->validation->validator_notes)
                                    <div class="flex justify-between">
                                        <span class="text-sm font-medium text-gray-500">Validation Notes:</span>
                                        <span class="text-sm text-gray-900">{{ $society->validation->validator_notes }}</span>
                                    </div>
                                @endif
                            </div>

                            @if($society->validation->status === 'accepted')
                                <div class="mt-4">
                                    <a href="{{ route('job-vacancies.index') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                        Browse Job Vacancies
                                    </a>
                                </div>
                            @endif
                        @else
                            <p class="text-gray-500">No validation request submitted yet.</p>
                            <div class="mt-4">
                                <a href="{{ route('validation.index') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                    Request Validation
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Quick Actions</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <a href="{{ route('validation.index') }}" class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <div class="flex-1 min-w-0">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">Data Validation</p>
                                    <p class="text-sm text-gray-500 truncate">Manage your data validation</p>
                                </div>
                            </a>
                            <a href="{{ route('applications.index') }}" class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <div class="flex-1 min-w-0">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">My Applications</p>
                                    <p class="text-sm text-gray-500 truncate">View your job applications</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
