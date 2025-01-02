<div class="container mx-auto px-4 text-center">
    <p>&copy; {{ date('Y') }} ArticleHub. All Rights Reserved.</p>
</div>

<script>
    /**Navbar Dropdown */
    document.getElementById('dropdownButton').addEventListener('click', function(event) {
        event.stopPropagation();
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });
    document.getElementById('userDropdownButton').addEventListener('click', function(event) {
        event.stopPropagation();
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        userDropdownMenu.classList.toggle('hidden');
    });
    window.addEventListener('click', function(event) {
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownButton = document.getElementById('dropdownButton');
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        const userDropdownButton = document.getElementById('userDropdownButton');
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
        if (!userDropdownButton.contains(event.target) && !userDropdownMenu.contains(event.target)) {
            userDropdownMenu.classList.add('hidden');
        }
    });
    /**Navbar Dropdown */
    /**Comment Submission */
    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch(this.action || window.location.href, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // alert('comment submitted successfully!');
                this.reset();
                document.getElementById('approval-message').style.display = 'block';
            })
            .catch(error => {
                // alert('Please try again.');
                console.error(error);
            });
    });
    /**Comment Submission */
    /**Navbar search */
        document.getElementById('hamburgerButton').addEventListener('click', function() {
            var mobileNavMenu = document.getElementById('mobileNavMenu');
            mobileNavMenu.style.display = mobileNavMenu.style.display === 'block' ? 'none' : 'block';
        });
        document.getElementById('searchInput').addEventListener('input', function() {
            var keyword = document.getElementById('searchInput').value;
            var productList = document.getElementById('product-listing');
            productList.innerHTML = '';
            if (keyword.length >= 1) {
                productList.classList.remove('hidden');
                fetch(`/articles/search?keyword=${keyword}`, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.articles.length > 0) {
                            data.articles.forEach(function(article) {
                                var listItem = `
                                <li class="list-group-item border-b border-gray-300 py-2 px-4 flex items-center">
                                    <i class="fa fa-search mr-2 text-gray-600"></i>
                                    <a href="/article-details/${article.slug}" class="text-blue-600 hover:text-blue-800">${article.name}</a>
                                </li>
                            `;
                                productList.innerHTML += listItem;
                            });
                        } else {
                            productList.innerHTML = '<li class="list-group-item">No articles found.</li>';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                productList.classList.add('hidden');
            }
        });
        document.addEventListener('click', function(event) {
            var searchBox = document.getElementById('search');
            var productList = document.getElementById('product-listing');

            if (!searchBox.contains(event.target)) {
                productList.classList.add('hidden');
            }
        });
    /** */
</script>