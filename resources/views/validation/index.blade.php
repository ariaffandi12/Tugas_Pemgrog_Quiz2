@extends('layouts.app')

@section('title', 'Data Validation - Jobseeker Platform')

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
                    <span class="text-gray-700">{{ $society->name ?? Auth::guard('society')->user()->name ?? 'User' }}</span>
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
                <a href="{{ route('validation.index') }}" class="flex items-center px-2 py-2 text-base font-medium text-gray-900 bg-gray-100 rounded-md group">
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
                @if(!$society || !$society->validation)
                    <!-- Request Validation Form -->
                    <div class="mb-6 overflow-hidden bg-white rounded-lg shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Request Data Validation</h3>

                            <form id="validationForm" class="space-y-6">
                                @csrf
                                <div>
                                    <label for="job_category" class="block text-sm font-medium text-gray-700">Job Category</label>
                                    <select id="job_category" name="job_category" required class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Job Category</option>
                                        @foreach($jobCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->job_category }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="work_experience" class="block text-sm font-medium text-gray-700">Work Experience</label>
                                    <select id="work_experience" name="work_experience" required class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Work Experience</option>
                                        <option value="0-1 years">0-1 years</option>
                                        <option value="1-3 years">1-3 years</option>
                                        <option value="3-5 years">3-5 years</option>
                                        <option value="5+ years">5+ years</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="job_position" class="block text-sm font-medium text-gray-700">Job Position</label>
                                    <textarea id="job_position" name="job_position" rows="3" required class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Describe your desired job position"></textarea>
                                </div>

                                <div>
                                    <label for="reason_accepted" class="block text-sm font-medium text-gray-700">Reason to be Accepted</label>
                                    <textarea id="reason_accepted" name="reason_accepted" rows="3" required class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Explain why you should be accepted"></textarea>
                                </div>

                                <div>
                                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Send Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Validation Status -->
                    <div class="mb-6 overflow-hidden bg-white rounded-lg shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Data Validation Progress</h3>

                            <div class="space-y-4">
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
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-500">Work Experience:</span>
                                    <span class="text-sm text-gray-900">{{ $society->validation->work_experience }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-medium text-gray-500">Reason Accepted:</span>
                                    <span class="text-sm text-gray-900">{{ $society->validation->reason_accepted }}</span>
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
                                <div class="mt-6">
                                    <a href="{{ route('job-vacancies.index') }}" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Add Job Application
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#validationForm').on('submit', function(e) {
        e.preventDefault();

        // Check if all fields are filled
        let isValid = true;
        $(this).find('input[required], select[required], textarea[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                return false;
            }
        });

        if (!isValid) {
            Swal.fire({
                title: 'Error!',
                text: 'Please fill in all required fields',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        $.ajax({
            url: '{{ route("validation.store") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            },
            error: function(xhr) {
                const response = xhr.responseJSON;
                Swal.fire({
                    title: 'Error!',
                    text: response.message || 'Validation request failed',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
@endsection
