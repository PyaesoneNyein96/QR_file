@extends('dashboard.dashboard-layout') <!-- Custom dashboard layout -->
@section('title', 'Dashboard') <!-- Custom title for the dashboard page -->
@section('page-title', 'Dashboard Overview') <!-- Custom page title for the dashboard -->


@section('content')


    <main class="flex-1 p-6">
        <h1 class="text-2xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}!</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Example Card -->
            <div class="bg-white rounded-lg p-6 shadow hover:shadow-md transition">
                <h2 class="text-lg font-bold mb-2">Users</h2>
                <p class="text-gray-600 text-sm">Manage all user accounts.</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow hover:shadow-md transition">
                <h2 class="text-lg font-bold mb-2">Analytics</h2>
                <p class="text-gray-600 text-sm">View recent analytics.</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow hover:shadow-md transition">
                <h2 class="text-lg font-bold mb-2">Messages</h2>
                <p class="text-gray-600 text-sm">Check your messages.</p>
            </div>
        </div>
    </main>

@endsection
