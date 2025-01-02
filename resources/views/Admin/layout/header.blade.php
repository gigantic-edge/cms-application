<h1 class="text-xl font-semibold">{{$page_header}}</h1>
<div class="flex items-center space-x-4">
    <div class="relative">
        <button
            class="flex items-center space-x-2 px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none"
            onclick="toggleDropdown1()">
            <span class="hidden sm:inline">{{$userDetails['name']}}</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg py-2">
            <a href="{{ url('/Administrator/profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="{{ url('/Administrator/logout') }}" onclick="return confirm('Are you sure to want Logout ?')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
    </div>
</div>