<main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form class="space-y-4" method="post">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Catrgory Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Category Name">
                    <span style="color: red;">@error('name'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                    <input
                        type="text"
                        id="order"
                        name="order"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Order">
                    <span style="color: red;">@error('order'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                        <option value="active" selected>Active</option>
                        <option value="inactive">In-active</option>
                    </select>
                    <span style="color: red;">@error('status'){{ $message }}@enderror</span>
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