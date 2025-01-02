<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS ||Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
        <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">CMS Login</h2>
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
        <form action="{{ url('Administrator/') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span style="color: red;">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span style="color: red;">@error('password'){{ $message }}@enderror</span>
            </div>
            <button type="submit"
                class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>
        </form>

        <!-- <div class="mt-4 text-center">
            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
        </div> -->

        <!-- <div class="mt-4 text-center">
            <p class="text-sm">Don't have an account? <a href="#" class="text-blue-600 hover:underline">Sign up</a></p>
        </div> -->
    </div>
</body>

</html>