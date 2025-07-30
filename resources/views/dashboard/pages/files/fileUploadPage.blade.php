@extends('dashboard.dashboard-layout') <!-- Custom dashboard layout -->
@section('title', 'File Upload') <!-- Custom title for the dashboard page -->


@section('content')

    <div class=" mt-20 flex items-center justify-center">

        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            <h2 class="text-3xl font-bold text-center text-green-700 mb-6">📤 Upload File</h2>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dashboard.fileUpload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- File Upload -->
                <div>
                    <label for="file" class="block text-sm font-semibold text-gray-700 mb-1">Select File</label>
                    <input type="file" name="file" id="file" required
                        class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-500 focus:border-green-500 transition" />
                </div>

                {{-- File Name --}}

                <div class="">
                    <label for="file_name" class="block text-sm font-semibold text-gray-700 mb-1">File Name</label>
                    <input type="text" name="name" id="file_name" required
                        class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-500 focus:border-green-500 transition" />
                </div>

                {{-- File Description --}}
                <div class="">
                    <label for="file_description" class="block text-sm font-semibold text-gray-700 mb-1">File
                        Description</label>
                    <textarea name="description" id="file_description" rows="2"
                        class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-500 focus:border-green-500 transition"></textarea>
                </div>

                <!-- Category Select -->
                <div>
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                    <select name="category_id" id="category" required
                        class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-green-500 focus:border-green-500 transition">
                        <option value="" disabled hidden selected>-- Choose Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        Upload Now
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
