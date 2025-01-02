<style>
    .article-img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
    }
</style>

<section class="container mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <div class="lg:w-2/3 bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{$article_detail['name']}}</h1>
            <p class="text-gray-600 text-sm mb-6">
                By <span class="font-medium text-blue-600">{{$article_detail['author']}}</span>
                | Published on <span class="text-gray-500">{{ \Carbon\Carbon::parse($article_detail['created_at'])->format('l, F j, Y h:i A') }}</span>
            </p>
            <img src="{{asset('/storage/images/articles/' . $article_detail['featured_image'])}}" alt="Article Image" class="article-img mb-6 rounded">
            <div class="prose max-w-none text-gray-700">
                {!! $article_detail->description !!}
            </div>
        </div>
        <div class="lg:w-1/3 bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Related Articles</h2>
            <ul class="space-y-4">
                @forelse($related_articles as $related_article)
                <li class="flex items-start gap-4 p-4 border border-gray-300 rounded-lg">
                    <img src="{{ asset('/storage/images/articles/' . $related_article->featured_image) }}" alt="{{ $related_article->name }}" class="w-16 h-16 object-cover rounded-md shadow-sm">
                    <div>
                        <a href="{{ url('article-details', ['slug' => $related_article->slug]) }}" class="text-blue-600 hover:underline font-semibold">
                            {{ $related_article->name }}
                        </a>
                        <p class="text-sm text-gray-600 mt-1">{!! Str::limit($related_article['short_description'], 80, '...') !!}</p>
                    </div>
                </li>
                @empty
                    <p class="text-gray-600">No related articles found at the moment.</p>
                @endforelse
            </ul>
        </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Articles from Other Categories</h2>
        <ul class="space-y-4">
            @if($other_category_articles && $other_category_articles->count() > 0)
                @foreach ($other_category_articles as $article)
                    <li class="flex items-start gap-4 p-4 border border-gray-300 rounded-lg">
                        <img src="{{ asset('/storage/images/articles/' . $article->featured_image) }}" alt="{{ $article->name }}" class="w-16 h-16 object-cover rounded-md shadow-sm">
                        <div>
                            <a href="{{ url('article-details', ['slug' => $article->slug]) }}" class="text-blue-600 hover:underline font-semibold">
                                {{ $article->name }}
                            </a>
                            <p class="text-sm text-gray-600 mt-1">{!! Str::words($article['short_description'], 30, '...') !!}</p>
                        </div>
                    </li>
                @endforeach
            @else
                <p class="text-gray-600">No articles found in other categories.</p>
            @endif
        </ul>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Comments</h2>
        @if(!Auth::check())
            <div class="bg-yellow-100 text-yellow-700 p-4 rounded mb-6">
                <p>
                    You must be logged in to comment.
                    <a href="{{ url('/login') }}" class="text-blue-600 hover:underline">Login here.</a>
                </p>
            </div>
        @else
            <form class="mb-6" id="commentForm" method="POST">
                @csrf
                <textarea class="w-full h-24 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Write your comment here..." name="comment" required></textarea>
                    <button type="submit" class="mt-3 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        Submit Comment
                    </button>
                <div id="approval-message" class="mt-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg flex items-center" style="display: none;">
                    <i class="fas fa-clock h-6 w-6 text-yellow-500 mr-2"></i>
                    <span>Your comment is waiting for admin approval.</span>
                </div>
            </form>
        @endif
        <div>
            @if($comments && $comments->count() > 0)
                @foreach($comments as $comment)
                    <div class="border-t border-gray-300 pt-4">
                        <p class="font-semibold text-gray-800">
                            {{$comment['user_name']}}
                            <span class="text-sm text-gray-600 italic">{{ $comment->created_at->format('F j, Y h:i A') }}</span>
                        </p>
                        <p class="mt-2 text-gray-700">{{ $comment->comment }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-gray-600">No comments yet.</p>
            @endif
        </div>
    </div>
</section>