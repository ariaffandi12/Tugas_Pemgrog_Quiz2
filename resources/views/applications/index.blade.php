@extends('layouts.app')

@section('title', 'My Applications - Jobseeker Platform')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900">Jobseeker Platform</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Session::get('society_name') }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-sm min-h-screen">
            <nav class="mt-5 px-2">
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Dashboard
                </a>
                <a href="{{ route('validation.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    My Data Validation
                </a>
                <a href="{{ route('job-vacancies.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Job Vacancies
                </a>
                <a href="{{ route('applications.index') }}" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    My Job Applications
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">My Job Applications</h2>

                <div class="grid gap-6">
                    @forelse($applications as $application)
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $application->jobVacancy->company }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $application->jobVacancy->address }}</p>
                                        <p class="mt-1 text-sm text-gray-500">Applied on: {{ $application->date->format('M d, Y') }}</p>

                                        <div class="mt-4">
                                            <h4 class="text-sm font-medium text-gray-900">Applied Positions:</h4>
                                            <div class="mt-2 space-y-2">
                                                @foreach($application->jobApplyPositions as $position)
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-sm text-gray-700">{{ $position->availablePosition->position }}</span>
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                            @if($position->status === 'pending') bg-yellow-100 text-yellow-800
                                                            @elseif($position->status === 'accepted') bg-green-100 text-green-800
                                                            @else bg-red-100 text-red-800 @endif">
                                                            {{ ucfirst($position->status) }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        @if($application->notes)
                                            <div class="mt-4">
                                                <h4 class="text-sm font-medium text-gray-900">Notes:</h4>
                                                <p class="mt-1 text-sm text-gray-700">{{ $application->notes }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500">You haven't applied for any jobs yet.</p>
                            <div class="mt-4">
                                <a href="{{ route('job-vacancies.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Browse Job Vacancies
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
