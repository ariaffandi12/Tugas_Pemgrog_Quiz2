@extends('layouts.app')

@section('title', 'Job Vacancy Details - Jobseeker Platform')

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
                <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group">
                    Dashboard
                </a>
                <a href="{{ route('validation.index') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group">
                    My Data Validation
                </a>
                <a href="{{ route('job-vacancies.index') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-900 bg-gray-100 rounded-md group">
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
                <div class="mb-4">
                    <a href="{{ route('job-vacancies.index') }}" class="text-indigo-600 hover:text-indigo-500">
                        ← Back to Job Vacancies
                    </a>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <h2 class="mb-2 text-2xl font-bold text-gray-900">{{ $jobVacancy->company }}</h2>
                        <p class="mb-4 text-gray-600">{{ $jobVacancy->address }}</p>

                        <div class="mb-6">
                            <h3 class="mb-2 text-lg font-medium text-gray-900">Description</h3>
                            <p class="text-gray-700">{{ $jobVacancy->description }}</p>
                        </div>

                        @if(!$hasApplied)
                            <form id="applicationForm" class="space-y-6" action="{{ route('applications.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="vacancy_id" value="{{ $jobVacancy->id }}">

                                <div>
                                    <h3 class="mb-4 text-lg font-medium text-gray-900">Select Position(s)</h3>

                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Select
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Position
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Capacity
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Applications / Max
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($jobVacancy->availablePositions as $position)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <input type="checkbox" name="positions[]" value="{{ $position->id }}"
                                                                   class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                            {{ $position->position }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ $position->capacity }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ $position->apply_count }} / {{ $position->apply_capacity }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div>
                                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes for Company</label>
                                    <textarea id="notes" name="notes" rows="4" required
                                              class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                              placeholder="Explain why you should be accepted for this position"></textarea>
                                </div>

                                <div>
                                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Apply for this Job
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="py-8 text-center">
                                <div class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm">
                                    You have already applied for this job
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
