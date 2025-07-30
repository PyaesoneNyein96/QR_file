@extends('dashboard.dashboard-layout') <!-- Custom dashboard layout -->
@section('title', 'Categories') <!-- Custom title for the dashboard page -->

@section('content')

    <div class=" bg-gray-100 p-5">
        <div class="flex flex-col md:flex-row gap-6 h-[80vh]">

            <!-- Left: Categories -->
            <div class="w-full md:w-1/2 bg-white shadow rounded-lg pb-10  overflow-y-scroll relative">
                <h2 class="text-xl font-bold mb-4  p-5 bg-white sticky top-0">Categories</h2>
                <ul class="space-y-2 px-7">
                    @foreach ($categories as $category)
                        <li class="p-2 rounded hover:bg-slate-200 cursor-pointer flex justify-between items-center">
                            <span>{{ $category->name }}</span>
                            <span>
                                <a href="{{ route('dashboard.categoryEdit', $category->id) }}"
                                    class="bg-green-700 text-white px-2 py-1 rounded hover:bg-green-600">Edit</a>
                                <a href="{{ route('dashboard.categoryDelete', $category->id) }}"
                                    class="bg-red-700 text-white px-2 py-1 rounded hover:bg-red-600">Delete</a>

                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Right: Content -->

            @if (Route::currentRouteName() == 'dashboard.categories')
                <div class="w-full md:w-1/2  rounded-lg p-4">
                    <h2 class="text-xl font-bold mb-4">Create Category</h2>
                    <form action="{{ route('dashboard.categoryCreate') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            <label for="description"
                                class="mt-5 block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                rows="3"></textarea>
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">Create
                            Category</button>
                    </form>
                </div>
            @else
            @endif



        </div>
    </div>


@endsection
