<section class="bg-blue-600 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to ArticleHub</h1>
        <p class="text-lg">Discover, Read, and Engage with Quality Articles</p>
        <a href="#articles" class="mt-4 inline-block bg-white text-blue-600 py-2 px-6 rounded hover:bg-gray-200">Explore Articles</a>
    </div>
</section>
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
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.415-1.414l2.934-2.936-2.934-2.934a1 1 0 011.415-1.414L10 8.586l2.936-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.936a1 1 0 010 1.414z" />
        </svg>
    </span>
</div>
@endif
<!-- Login Section -->
<section id="login" class="bg-gray-100 py-12">
    <div class="container mx-auto px-4 max-w-sm bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Login to ArticleHub</h2>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <span style="color: red;">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <span style="color: red;">@error('password'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">Login</button>
        </form>
        <div class="mt-2 text-center">
            <p class="text-sm text-gray-600">Don't have an account? <a href="{{ url('/signup') }}" class="text-blue-600 hover:underline">Sign Up</a></p>
        </div>
    </div>
</section>