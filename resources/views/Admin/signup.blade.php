<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS || Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
        <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">Register</h2>
        <!-- {{session('error-msg')}} -->
        <!-- @if (session('error-msg'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error-msg') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.415-1.414l2.934-2.936-2.934-2.934a1 1 0 011.415-1.414L10 8.586l2.936-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.936a1 1 0 010 1.414z" />
                </svg>
            </span>
        </div>
        @endif -->
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
        
        <form action="{{ url('Administrator/signup') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{old('name')}}">
                <span style="color: red;">@error('name'){{ $message }}@enderror</span>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{old('email')}}">
                <span style="color: red;">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-4">
                <label for="mobile" class="block text-sm font-medium text-gray-600">Mobile</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{old('mobile')}}">
                <span style="color: red;">@error('mobile'){{ $message }}@enderror</span>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <span style="color: red;">@error('password'){{ $message }}@enderror</span>
            </div>
            <div class="mb-6">
                <label for="confirm-password" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <span style="color: red;">@error('confirm-password'){{ $message }}@enderror</span>
            </div>
            <div class="mb-6 flex items-center">
                <input type="checkbox" id="terms" name="terms" class="mr-2">
                <label for="terms" class="text-sm text-gray-600">I agree to the <a href="#" class="text-blue-500 hover:underline">Terms and Conditions</a></label>
            </div>
            <span style="color: red;">@error('terms'){{ $message }}@enderror</span>
            <button type="submit"
                class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Register
            </button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-sm">Already have an account? <a href="{{ url('Administrator/') }}" class="text-blue-600 hover:underline">Login</a></p>
        </div>
    </div>
</body>

</html>