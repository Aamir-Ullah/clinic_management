
@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <p class="text-6xl font-bold text-red-600">403</p>

        <h1 class="mt-4 text-2xl font-bold text-gray-800">
            Access Denied
        </h1>

        <p class="mt-3 text-gray-600">
            You do not have permission to access this page.
        </p>

        @auth
            @if (auth()->user()->hasRole('Admin'))
                <a href="{{ route('admin.dashboard') }}"
                   class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded">
                    Back to Admin Dashboard
                </a>
            @elseif (auth()->user()->hasRole('Doctor'))
                <a href="{{ route('doctor.dashboard') }}"
                   class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded">
                    Back to Doctor Dashboard
                </a>
            @elseif (auth()->user()->hasRole('Patient'))
                <a href="{{ route('patient.dashboard') }}"
                   class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded">
                    Back to Patient Dashboard
                </a>
            @else
                <a href="/"
                   class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded">
                    Back to Home
                </a>
            @endif
        @else
            <a href="{{ route('login') }}"
               class="inline-block mt-6 bg-blue-600 text-white px-5 py-2 rounded">
                Go to Login
            </a>
        @endauth
    </div>
@endsection
