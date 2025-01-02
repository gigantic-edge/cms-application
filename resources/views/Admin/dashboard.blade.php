<div>
    @if (session('message'))
    <div class="px-4 py-3 rounded relative 
            @if(session('type') == 'error') bg-red-100 border border-red-400 text-red-700 
            @elseif(session('type') == 'success') bg-green-100 border border-green-400 text-green-700 
            @elseif(session('type') == 'warning') bg-yellow-100 border border-yellow-400 text-yellow-700 
            @endif"
        role="alert">
        <strong class="font-bold">
            {{ ucfirst(session('type')) }}!
        </strong>
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
            <svg class="fill-current h-6 w-6 text-black-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.415-1.414l2.934-2.936-2.934-2.934a1 1 0 011.415-1.414L10 8.586l2.936-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.936a1 1 0 010 1.414z" />
            </svg>
        </span>
    </div>
    @endif
</div>
<main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow-lg p-6 flex items-center space-x-4">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-800">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-bold">Categories</h3>
                <h3 class="text-xl text-blue-100">{{$catCount}}</h3>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-gradient-to-r from-green-500 to-green-700 text-white rounded-lg shadow-lg p-6 flex items-center space-x-4">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-800">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-bold">Sub Categories</h3>
                <h3 class="text-xl font-bold">{{$subCatCount}}</h3>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white rounded-lg shadow-lg p-6 flex items-center space-x-4">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-purple-800">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-bold">Articles</h3>
                <h3 class="text-xl font-bold">{{$articleCount}}</h3>
            </div>
        </div>

         <!-- Card 1 -->
         <div class="bg-gradient-to-r from-red-500 to-red-700 text-white rounded-lg shadow-lg p-6 flex items-center space-x-4">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-red-800">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-bold">Comments</h3>
                <h3 class="text-xl font-bold">{{$commentCount}}</h3>
            </div>
        </div>
    </div>
</main>
