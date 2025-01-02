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
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4">User Details Form</h2>
        <form class="space-y-4" method="post" >
            @csrf
           <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input
                        type="text" 
                        id="name"
                        name="name"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ $user_details->name }}">
                        <span style="color: red;">@error('name'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ $user_details->email }}">
                        <span style="color: red;">@error('email'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                    <input
                        type="text"
                        id="mobile"
                        name="mobile"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ $user_details->mobile }}">
                        <span style="color: red;">@error('mobile'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your password">
                        <span style="color: red;">@error('password'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input
                        type="password"
                        id="confirm-password"
                        name="confirm-password"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Confirm your password">
                        <span style="color: red;">@error('confirm-password'){{ $message }}@enderror</span>
                </div>
            </div>
            <div>
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 transition-all duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>
</main>