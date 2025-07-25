    <aside :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="bg-white h-full shadow-lg transition-all duration-300 flex flex-col">
        <div class="p-4 border-b font-bold text-xl">
            <span x-show="sidebarOpen">Dashboard</span>
            <span x-show="!sidebarOpen" class="text-2xl">🏠</span>
        </div>
        <nav class="flex-1 p-4 space-y-2 text-gray-700">
            <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-200">
                <span class="text-xl">🏠</span>
                <span x-show="sidebarOpen">Home</span>
            </a>

            @if (Auth::user() && Auth::user()->isAdmin())
                <a href="#" class="flex items-center space-x-3 p-2 rounded "
                    :class="sidebarOpen ? ' bg-blue-200 text-blue-600' : 'text-gray-700'">
                    <span class="text-xl">👤</span>
                    <span x-show="sidebarOpen">User</span>
                </a>
            @endif

            <div x-data="{ open: '{{ Str::startsWith(Route::currentRouteName(), 'dashboard.file') ? 'true' : 'false' }}' == 'true' }" class="">

                <a @click="open = !open"
                    class="flex items-center space-x-3 p-2 rounded hover:bg-gray-200 cursor-pointer">
                    <span class="icon pr-5">📊</span>
                    <span x-show="sidebarOpen">Files</span>

                    <div class=" w-full">

                        <svg x-show="sidebarOpen" class="ml-auto w-4 h-4 transition-transform duration-500"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </a>

                <div x-show="open && sidebarOpen" x-cloak x-transition>
                    <a href="{{ route('dashboard.fileUploadPage') }}"
                        class="{{ Route::currentRouteName() == 'dashboard.fileUploadPage' ? 'bg-slate-300 text-green' : '' }}  text-sm  hover:bg-slate-200 text-blue flex items-center space-x-3 p-2 rounded">
                        <span class="icon pl-5">⬆️</span>
                        <span x-show="sidebarOpen">Upload File </span>
                    </a>
                    <a href="{{ route('dashboard.files') }}"
                        class="{{ Route::currentRouteName() == 'dashboard.files' ? 'bg-slate-300 text-green' : '' }}  text-sm  hover:bg-slate-200 text-blue flex items-center space-x-3 p-2 rounded">
                        <span class="icon pl-5">🗂️</span>
                        <span x-show="sidebarOpen">File List</span>
                    </a>
                    <a href="{{ route('dashboard.filesUploadHistory') }}"
                        class="{{ Route::currentRouteName() == 'dashboard.filesUploadHistory' ? 'bg-slate-300 text-green' : '' }}  text-sm  hover:bg-slate-200 text-blue flex items-center space-x-3 p-2 rounded">
                        <span class="icon pl-5">🗂️</span>
                        <span x-show="sidebarOpen">File Upload History</span>
                    </a>
                </div>

            </div>

            {{-- CATEGORIES --}}
            <div x-data="{ open: '{{ Str::startsWith(Route::currentRouteName(), 'dashboard.categories') ? 'true' : 'false' }}' == 'true' }" class="">

                <a @click="open = !open"
                    class="flex items-center space-x-3 p-2 rounded hover:bg-gray-200 cursor-pointer">
                    <span class="icon pr-5">🏷️</span>
                    <span x-show="sidebarOpen">Categories</span>

                    <div class=" w-full">

                        <svg x-show="sidebarOpen" class="ml-auto w-4 h-4 transition-transform duration-500"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </a>

                <div x-show="open && sidebarOpen" x-cloak x-transition>
                    <a href="#"
                        class="{{ Route::currentRouteName() == 'dashboard.files.create-page' ? 'bg-slate-300 text-green' : '' }}  text-sm  hover:bg-slate-200 text-blue flex items-center space-x-3 p-2 rounded">
                        <span class="icon pl-5">📝</span>
                        <span x-show="sidebarOpen">Category Create</span>
                    </a>
                    <a href="{{ route('dashboard.files') }}"
                        class="{{ Route::currentRouteName() == 'dashboard.files' ? 'bg-slate-300 text-green' : '' }}  text-sm  hover:bg-slate-200 text-blue flex items-center space-x-3 p-2 rounded">
                        <span class="icon pl-5">🗂️</span>
                        <span x-show="sidebarOpen">Category List</span>
                    </a>
                </div>

            </div>




            <a href="#"
                class="flex items-center space-x-3 p-2 rounded hover:bg-gray-200 disabled:opacity-50 cursor-not-allowed">
                <span class="text-xl">⚙️</span>
                <span x-show="sidebarOpen">Settings</span>
            </a>
        </nav>
    </aside>
