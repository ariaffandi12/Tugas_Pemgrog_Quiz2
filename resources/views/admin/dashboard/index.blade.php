@extends('layouts.admin')

@section('title', 'Admin Dashboard - Jobseeker Platform')

@section('content')
<div class="py-6">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Pending Validations -->
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-3 bg-yellow-500 rounded-md">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Pending Validations
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $pendingValidations }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-4 bg-gray-50 sm:px-6">
                    <div class="text-sm">
                        <a href="{{ route('admin.validations.index') }}?status=pending" class="font-medium text-indigo-600 hover:text-indigo-500">
                            View all
                        </a>
                    </div>
                </div>
            </div>

            <!-- Accepted Validations -->
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-3 bg-green-500 rounded-md">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Accepted Validations
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $acceptedValidations }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-4 bg-gray-50 sm:px-6">
                    <div class="text-sm">
                        <a href="{{ route('admin.validations.index') }}?status=accepted" class="font-medium text-indigo-600 hover:text-indigo-500">
                            View all
                        </a>
                    </div>
                </div>
            </div>

            <!-- Declined Validations -->
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-3 bg-red-500 rounded-md">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Declined Validations
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $declinedValidations }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-4 bg-gray-50 sm:px-6">
                    <div class="text-sm">
                        <a href="{{ route('admin.validations.index') }}?status=declined" class="font-medium text-indigo-600 hover:text-indigo-500">
                            View all
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats -->
        <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2">
            <!-- Total Societies -->
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-3 bg-blue-500 rounded-md">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Societies
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $totalSocieties }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Job Vacancies -->
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-3 bg-purple-500 rounded-md">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Job Vacancies
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ $totalVacancies }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($adminRole === 'validator' && count($assignedValidations) > 0)
            <!-- Assigned Validations for Validators -->
            <div class="mt-8">
                <h2 class="text-lg font-medium text-gray-900">Your Assigned Validations</h2>
                <div class="mt-4 overflow-hidden bg-white shadow sm:rounded-md">
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($assignedValidations as $validation)
                            <li>
                                <a href="{{ route('admin.validations.show', $validation->id) }}" class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-indigo-600 truncate">
                                                {{ $validation->society->name }}
                                            </p>
                                            <div class="flex flex-shrink-0 ml-2">
                                                @if($validation->status === 'pending')
                                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                                        Pending
                                                    </span>
                                                @elseif($validation->status === 'accepted')
                                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                        Accepted
                                                    </span>
                                                @else
                                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                        Declined
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <p class="flex items-center text-sm text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                                    </svg>
                                                    {{ $validation->jobCategory->job_category }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
