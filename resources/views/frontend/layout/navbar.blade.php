<div class="container mx-auto px-4 py-4 flex justify-evenly relative">
    <a href="{{url('')}}" class="text-2xl font-bold text-blue-600">ArticleHub</a>
    <div class="relative hidden md:block" id="search">
        <input type="text" id="searchInput" class="form-control input-lg border border-gray-300  px-4 py-2 w-96 focus:ring-2 focus:ring-blue-500" placeholder="Search Here" value="" name="search">
        <button class="btn btn-default absolute right-0 top-0 bg-blue-600 text-white  px-4 py-2">
            <i class="fa fa-search"></i>
        </button>
        <ul id="product-listing" class="scrollable-list hidden absolute left-0 mt-2 w-full bg-white shadow-lg z-10 rounded-md max-h-60 overflow-y-auto">
        </ul>
    </div>
    <button class="md:hidden text-gray-700" id="hamburgerButton">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="flex justify-center items-center space-x-8 md:flex hidden" id="navLinks">
        <a href="{{ url('') }}" class="text-gray-700 hover:text-blue-600 mx-2">Home</a>
        <div class="relative inline-block text-left">
            <div>
                <button type="button" class="text-gray-700 hover:text-blue-600 mx-2 inline-flex justify-center items-center text-sm font-medium" id="dropdownButton">
                    Categories
                    <svg class="-mr-1 ml-2 h-5 w-5 text-gray-700 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="absolute left-0 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden" id="dropdownMenu">
                <div class="py-1">
                    <ul class="space-y-2 text-sm text-gray-700">
                        @if ($categories)
                        @foreach ($categories as $category)
                        <li class="relative group">
                            <button class="block px-4 py-2 w-full text-left hover:bg-gray-100 rounded-md transition-all">
                                {{ $category->name }}
                            </button>
                            @if ($category->subcategories && $category->subcategories->count() > 0)
                            <ul class="absolute left-full top-0 mt-0 space-y-2 bg-white shadow-md rounded-md w-48 hidden group-hover:block">
                                @foreach ($category->subcategories as $subcategory)
                                <li>
                                    <a href="{{ url('article/'.base64_encode($subcategory->id)) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @if (session('is_user_login') == 1)
        <?php $username = session('name'); ?>
        <div class="relative inline-block text-left">
            <button type="button" class="text-gray-700 hover:text-blue-600 flex items-center text-sm font-medium" id="userDropdownButton">
                <span class="mr-2">{{ $username }}</span>
                <svg class="h-5 w-5 text-gray-700 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 hidden" id="userDropdownMenu">
                <div class="py-1">
                    <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
        @else
        <a href="{{ url('/login') }}" class="bg-blue-600 text-white py-1 px-4 rounded hover:bg-blue-700">Login</a>
        @endif
    </div>
</div>
<div class="md:hidden" id="mobileNavMenu" style="display: none;">
    <a href="{{ url('') }}" class="block px-4 py-2 text-gray-700 hover:text-blue-600">Home</a>
    <div class="relative inline-block text-left">
        <button type="button" class="block px-4 py-2 w-full text-left text-gray-700 hover:text-blue-600" id="dropdownButtonMobile">
            Categories
            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-700 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <a href="{{ url('/login') }}" class="block px-4 py-2 text-gray-700 hover:text-blue-600">Login</a>
</div>