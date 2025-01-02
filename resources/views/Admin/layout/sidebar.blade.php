@php
$current_url = url()->full();
$endPoint = explode('Administrator/', $current_url);
$isCategory = strpos($current_url, 'article-categories') !== false;
$isSubCategory = strpos($current_url, 'article-sub-categories') !== false;
$isArticle = strpos($current_url, 'articles') !== false;
@endphp

<aside class="w-full lg:w-64 bg-gray-800 text-gray-100 flex flex-col lg:h-full lg:fixed">
    <div class="p-4 text-lg font-bold border-b border-gray-700">
        Dashboard
    </div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ url('/Administrator/dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $endPoint[1] == 'dashboard' ? 'bg-gray-700 text-white' : '' }}">Home</a>
        <a href="{{ url('Administrator/users') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $endPoint[1] == 'users' ? 'bg-gray-700 text-white' : '' }}">Users</a>
        <div>
            <button
                class="w-full text-left px-4 py-2 rounded hover:bg-gray-700 flex items-center justify-between"
                onclick="toggleDropdown('dropdown2')">
                Articles
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdown2" class="space-y-2 pl-6 {{ ($isCategory || $isSubCategory || $isArticle) ? 'block' : 'hidden' }}">
                <a href="{{ url('Administrator/article-categories') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $isCategory ? 'bg-gray-700 text-white' : '' }}">Category</a>
                <a href="{{ url('Administrator/article-sub-categories') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $isSubCategory ? 'bg-gray-700 text-white' : '' }}">Sub-category</a>
                <a href="{{ url('Administrator/articles') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $isArticle ? 'bg-gray-700 text-white' : '' }}">Article</a>
            </div>
        </div>
        <a href="{{ url('Administrator/comments') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ $endPoint[1] == 'comments' ? 'bg-gray-700 text-white' : '' }}">Comments</a>
    </nav>
    <div class="p-4 border-t border-gray-700">
        <a href="{{ url('/Administrator/logout') }}" onclick="return confirm('Are you sure to want Logout ?')" class="block px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-center">
            Logout
        </a>
    </div>
</aside>