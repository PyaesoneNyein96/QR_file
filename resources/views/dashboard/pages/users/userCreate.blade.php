@extends('dashboard.dashboard-layout')

@section('title', 'Create User')

@section('content')
    <div class="max-w-2xl mx-auto shadow-md rounded-lg mt-20 p-6">
        <h2 class="text-2xl font-bold mb-4">Create User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.userCreate') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="User@gmail.com"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="********"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                @enderror
            </div>

            <!-- Role Selection -->
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                <select name="role" id="role" value="{{ old('role') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                    <option value="" selected hidden disabled>Select Role</option>
                    <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>User</option>
                    <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
                    {{-- <option value="moderator">🛡️ Moderator</option> --}}
                </select>
            </div>

            <!-- Submit -->
            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Create User
                </button>
            </div>
        </form>
    </div>
@endsection
