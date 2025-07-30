@extends('dashboard.dashboard-layout') <!-- Custom dashboard layout -->
@section('title', 'File List') <!-- Custom title for the dashboard page -->

@section('content')
    <div class="max-w-12xl mx-auto p-4">
        <h2 class="text-2xl font-semibold  mb-4">📁 File List</h2>

        <table class="min-w-full bg-white border rounded shadow text-center">
            <thead>
                <tr class="bg-gray-100 text-gray-700 ">
                    <th class="p-3 border-b">#</th>
                    <th class="p-3 border-b text-left">File Name</th>
                    <th class="p-3 border-b">Size</th>
                    <th class="p-3 border-b">Link</th>
                    <th class="p-3 border-b">Upload by</th>
                    <th class="p-3 border-b">QR Code</th>
                    <th class="p-3 border-b">Category</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($files as $index => $file)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $index + 1 }}</td>
                        <td class="p-3 max-w-[200px] text-left">{{ $file->name }}</td>
                        <td class="p-3">{{ number_format($file->size / 1024, 2) }} KB</td>
                        <td class="p-3 max-w-[50px] overflow-hidden">
                            <a href="{{ asset($file->path) }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $file->path }}
                            </a>
                        </td>
                        <td class="p-3">
                            {{ $file->user ? $file->user->name : 'Unknown' }}
                        </td>
                        <td class="p-3">
                            <a href="{{ route('dashboard.fileQrCode', $file->id) }}" class="text-blue-500 hover:underline"
                                target="_blank">
                                QR_Code
                            </a>
                        </td>


                        <td class="p-3">
                            {{ $file->category ? $file->category->name : 'Uncategorized' }}
                        </td>
                        <td class="p-3 space-x-2">

                            <a href="{{ route('dashboard.fileDownload', $file->id) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                Download
                            </a>



                            <a href="{{ route('dashboard.fileDelete', $file->id) }}"
                                class="px-3 py-1 bg-red-700 text-white rounded hover:bg-red-600 text-sm">
                                Delete
                            </a>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-3 text-center text-gray-500">No files found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $files->links() }} <!-- Pagination links -->
        </div>
    </div>
@endsection
