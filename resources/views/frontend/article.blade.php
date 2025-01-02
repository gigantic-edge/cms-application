<style>
    .article-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .article-card img {
        transition: transform 0.3s ease;
    }

    .article-card:hover img {
        transform: scale(1.05);
    }
</style>
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-semibold text-gray-900 mb-6">{{$sub_cat_name['name']}}</h2>
            @if ($articles->isEmpty())
            <div class="bg-yellow-100 p-4 rounded-lg text-yellow-800">
                <p>No articles found.</p>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach ($articles as $article)
                <div class="article-card bg-white rounded-lg overflow-hidden shadow-lg">
                    <a href="{{ url('article-details', $article->slug) }}" target="_blank">
                        <div class="relative">
                            <img src="{{ asset('/storage/images/articles/' . $article['featured_image']) }}" alt="Article Image" class="w-full h-64 object-cover transform hover:scale-105 transition-all opacity-80">
                            <div class="absolute bottom-0 left-0 p-6 bg-gradient-to-t from-black via-transparent to-transparent w-full text-white">
                                <h3 class="text-2xl font-semibold">{{ $article->name }}</h3>
                                <p class="text-sm mt-2 opacity-80">{!! Str::limit($article->short_description, 100) !!}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $articles->links() }}
            </div>
            @endif
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">About Us</h3>
            <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet libero vehicula, interdum elit sit amet, pharetra arcu.</p>
            <div class="mt-6">
                <a href="#" class="text-blue-600 hover:text-blue-800">Learn More</a>
            </div>
        </div>
    </div>
</div>