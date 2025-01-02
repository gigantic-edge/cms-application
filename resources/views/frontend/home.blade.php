<style>
    .article-image {
        width: 100%;
        max-width: 100%;
        height: auto;
        max-height: 250px;
        object-fit: cover;
    }

    .article-card {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .article-content {
        flex-grow: 1;
        padding: 1rem;
    }

    .article-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .article-description {
        color: #718096;
        margin-bottom: 2.5rem;
    }
</style>
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
<section class="bg-blue-600 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to ArticleHub</h1>
        <p class="text-lg">Discover, Read, and Engage with Quality Articles</p>
        <a href="#articles" class="mt-4 inline-block bg-white text-blue-600 py-2 px-6 rounded hover:bg-gray-200">Explore Articles</a>
    </div>
</section>

<section id="articles" class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Featured Articles</h2>
        @if($latest_articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latest_articles as $latest_article)
            <a href="{{ url('article-details', ['slug' => $latest_article['slug']]) }}" class="article-card" target="_blank">
                <article>
                    <img src="{{ asset('/storage/images/articles/' . $latest_article['featured_image']) }}" alt="Article Image" class="article-image">
                    <div class="article-content">
                        <h3 class="article-title">{{ $latest_article['name'] }}</h3>
                        <p class="article-description">{!! Str::words($latest_article['short_description'], 30, '...') !!}</p>
                    </div>
                </article>
            </a>
            @endforeach
        </div>
        @else
        <p class="text-gray-600">No articles found at the moment.</p>
        @endif
    </div>
</section>