@extends('layouts.app')

@section('title', 'Job Vacancies - Jobseeker Platform')

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
                <a href="{{ route('job-vacancies.index') }}" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    Job Vacancies
                </a>
                <a href="{{ route('applications.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    My Job Applications
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Job Vacancies</h2>

                <div class="grid gap-6">
                    @forelse($jobVacancies as $vacancy)
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $vacancy->company }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $vacancy->address }}</p>

                                        <div class="mt-4">
                                            <h4 class="text-sm font-medium text-gray-900">Available Positions:</h4>
                                            <div class="mt-2 space-y-1">
                                                @foreach($vacancy->availablePositions as $position)
                                                    <div class="flex justify-between items-center text-sm">
                                                        <span class="text-gray-700">{{ $position->position }}</span>
                                                        <span class="text-gray-500">({{ $position->apply_count }}/{{ $position->capacity }})</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ml-4 flex-shrink-0">
                                        @if(in_array($vacancy->id, $appliedVacancies))
                                            <span class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-100">
                                                Vacancies has been applied
                                            </span>
                                        @else
                                            <a href="{{ route('job-vacancies.show', $vacancy->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Detail/Apply
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500">No job vacancies available for your category.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
