@extends('dashboard.dashboard-layout') <!-- Custom dashboard layout -->

@section('title', 'File Histories') <!-- Custom page title for the dashboard -->

@section('content')

    <div class="max-w-12xl mx-auto p-4">
        <h2 class="text-2xl font-semibold  mb-4">📁 File Histories</h2>

        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border-b">#</th>
                    <th class="p-3 border-b">File Name</th>
                    <th class="p-3 border-b">Type</th>

                    <th class="p-3 border-b">Uploaded by</th>
                    <th class="p-3 border-b">Category</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($histories as $index => $history)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $index + 1 }}</td>
                        <td class="p-3 max-w-[200px]">
                            {{ $history->file->name ?? null }}
                        </td>
                        <td class="p-3">{{ $history->type }}</td>


                        <td class="p-3">
                            {{ $history->user ? $history->user->name : 'Unknown' }}
                        </td>
                        <td class="p-3">
                            {{ $history->file ? $history->file->category->name : 'Uncategorized' }}
                        </td>
                        <td class="p-3">
                            {{ $history->action }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">No files found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
