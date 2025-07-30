@extends('dashboard.dashboard-layout') <!-- Custom dashboard layout -->

@section('title', 'User List') <!-- Custom page title for the dashboard -->

@section('content')

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">👥 User List</h2>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Role</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $index => $user)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 capitalize">{{ $user->role == 1 ? 'Admin' : 'User' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.userEdit', $user->id) }}"
                                    class="text-blue-600 hover:underline text-sm">✏️ Edit</a>

                                <form action="{{ route('dashboard.userDelete', $user->id) }}" method="POST" class="inline">
                                    @csrf

                                    <button
                                        class="ml-2 text-red-600 @if (Auth::user()->id == $user->id) cursor-not-allowed opacity-50 @endif"
                                        @if (Auth::user()->id == $user->id) disabled @endif type="submit"
                                        class="text-red-600  ml-2 ">🗑️
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
