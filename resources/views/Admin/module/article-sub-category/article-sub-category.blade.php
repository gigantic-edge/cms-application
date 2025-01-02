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
    <div class="flex items-center justify-between mb-4">
        <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 transition-all duration-200" href="{{ url('Administrator/add-article-sub-category') }}">Add {{$page_header}}</a>
    </div>
    <div class="bg-white rounded-lg shadow p-4 overflow-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2 border border-gray-300">ID</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Parent Category Name</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Sub-Category Name</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Order</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($categories && count($categories) > 0)
                @php
                $sl = 1
                @endphp
                @foreach($categories as $category)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{$sl++}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$category['category_name']}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$category['name']}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$category['ranking']}}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a class="px-2 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2" href="{{ url('/Administrator/edit-article-sub-category/' . $category['id']) }}">Edit</a>
                        <a onclick="return confirm('Are you sure to processed?');" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600" href="{{ url('/Administrator/delete-article-sub-category/' . $category['id']) }}">Delete</a>
                        <a onclick="return confirm('Are you sure to processed?');" class="px-2 py-1 bg-{{ $category['status'] == 'active' ? 'yellow' : 'blue' }}-500 text-white rounded-md hover:bg-{{ $category['status'] == 'active' ? 'yellow' : 'blue' }}-600" href="{{ $category['status'] == 'active' ? url('Administrator/article_sub_category_inactive/'.$category['id']) : url('Administrator/article_sub_category_active/'.$category['id']) }}">{{ $category['status'] == 'active' ? 'Inactivate' : 'Activate' }}
                        </a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">No data found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="pagination">
            {{ $categories->links() }}
        </div>
    </div>
</main>