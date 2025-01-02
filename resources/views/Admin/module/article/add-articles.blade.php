<main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form class="space-y-4" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                <div class="mb-4">
                    <label for="parent_category" class="block text-sm font-medium text-gray-700">Parent Category</label>
                    <select
                        id="parent_category"
                        name="parent_category"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Select Parent Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm">@error('parent_category'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label for="subcategory" class="block text-sm font-medium text-gray-700">Sub-Category</label>
                    <select id="subcategory" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500" name="subcategory">
                    </select>
                    <span class="text-red-500 text-sm">@error('subcategory'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Article Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{old('name')}}"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Category Name">
                    <span style="color: red;">@error('name'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Author Name</label>
                    <input
                        type="text"
                        id="author"
                        name="author"
                        value="{{old('author')}}"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Author Name">
                    <span style="color: red;">@error('author'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                    <textarea name="short_description" id="short_description" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500">{{old('description')}}</textarea>
                    <span style="color: red;">@error('short_description'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="editor1" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500">{{old('description')}}</textarea>
                    <span style="color: red;">@error('description'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input
                        type="file"
                        id="featured_image"
                        name="featured_image"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                    <span style="color: red;">@error('featured_image'){{ $message }}@enderror</span>
                </div>
                <div id="image-preview"></div>
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                    <input
                        type="text"
                        id="order"
                        value="{{old('order')}}"
                        name="order"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm text-base py-2 px-3 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Order">
                    <span style="color: red;">@error('order'){{ $message }}@enderror</span>
                </div>
                <div class="mt-6">
                    <label for="is_featured" class="block text-sm font-medium text-gray-700">
                        <input type="hidden" name="is_featured" value="0">
                        <input
                            class="mr-2 rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            type="checkbox"
                            value="1"
                            name="is_featured"
                            id="is_featured">
                        Add to Featured Article
                    </label>
                    <span style="color: red;">@error('is_featured'){{ $message }}@enderror</span>
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