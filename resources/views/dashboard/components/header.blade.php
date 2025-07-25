       <header class="flex items-center justify-between p-2 pb-3 bg-white shadow">
           <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none"
               aria-label="Toggle sidebar">
               <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                   stroke-linejoin="round" viewBox="0 0 24 24">
                   <line x1="3" y1="12" x2="21" y2="12" />
                   <line x1="3" y1="6" x2="21" y2="6" />
                   <line x1="3" y1="18" x2="21" y2="18" />
               </svg>
           </button>
           <h1 class="text-xl font-bold">Dashboard</h1>
           <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                   Logout
               </button>
           </form>
       </header>
