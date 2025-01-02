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
        <a class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 transition-all duration-200" href="{{ url('Administrator/add-article') }}">Add {{$page_header}}</a>
    </div>
    <div class="bg-white rounded-lg shadow p-4 overflow-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left px-4 py-2 border border-gray-300">ID</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Parent Category Name</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Sub-Category Name</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Article</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Author</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Featured Image</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Is Featured</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Order</th>
                    <th class="text-left px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($articles && count($articles) > 0)
                @php
                $sl = 1
                @endphp
                @foreach($articles as $article)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{$sl++}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$article['category_name']}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$article['sub_category_name']}}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        {{ \Illuminate\Support\Str::limit($article['name'], 40) }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">{{$article['author']}}</td>
                    <td class="px-4 py-2 border border-gray-300"><img src="{{ asset('/storage/images/articles/' . $article['featured_image']) }}" alt="Featured Image" class="w-32 h-32 object-cover"></td>
                    <td class="px-4 py-2 border border-gray-300">
                    <span class="inline-block bg-{{$article['is_featured_article'] == '1' ? 'blue' : 'red'}}-500 text-white text-xs font-semibold rounded-full px-3 py-1">
                        {{$article['is_featured_article'] == '1' ? 'Yes' : 'No'}}
                    </span>
                    </td>
                    <td class="px-4 py-2 border border-gray-300">{{$article['ranking']}}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a class="px-2 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2" href="{{ url('/Administrator/edit-article/'.$article['id']) }}">Edit</a>
                        @if($user_type == 'ADMIN')
                        <a onclick="return confirm('Are you sure to processed?');" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600" href="{{ url('/Administrator/delete-article/' . $article['id']) }}">Delete</a>
                        <a onclick="return confirm('Are you sure to processed?');" class="px-2 py-1 bg-{{ $article['status'] == 'active' ? 'yellow' : 'blue' }}-500 text-white rounded-md hover:bg-{{ $article['status'] == 'active' ? 'yellow' : 'blue' }}-600" href="{{ $article['status'] == 'active' ? url('Administrator/article_inactive/'.$article['id']) : url('Administrator/article_active/'.$article['id']) }}">{{ $article['status'] == 'active' ? 'Inactivate' : 'Activate' }}
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="px-4 py-2 text-center text-gray-500">No data found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </div>
</main>