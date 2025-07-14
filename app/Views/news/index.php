<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">Latest Cricket News</h1>

<div id="news-container"></div>

<div class="text-center mt-4">
    <button id="loadMoreBtn" class="btn btn-primary">Load More</button>
    <div id="loader" class="mt-2 d-none">Loading...</div>
</div>

<script>
    let currentPage = 1;

    function loadNews(page) {
        document.getElementById('loader').classList.remove('d-none');
        fetch(`<?= site_url('news/ajax?page=') ?>` + page)
            .then(response => response.json())
            .then(data => {
                console.log('data',data);
                const container = document.getElementById('news-container');
                if (data.length === 0) {
                    document.getElementById('loadMoreBtn').disabled = true;
                    document.getElementById('loadMoreBtn').innerText = "No More News";
                }
                data.forEach(news => {
                    const card = document.createElement('div');
                    card.className = 'card mb-3';
                    card.innerHTML = `
                        <div class="card-body">
                            <h5 class="card-title">${news.title}</h5>
                            ${news.image ? `<img src="${news.image}" class="img-fluid mb-2" style="max-height: 300px;" />` : ''}
                            <p class="card-text">${news.description || ''}</p>
                            <a href="${news.url}" target="_blank" class="btn btn-primary">Read More</a>
                            <p class="text-muted mt-2"><small>Published at: ${new Date(news.published_at).toLocaleString()}</small></p>
                        </div>
                    `;
                    container.appendChild(card);
                });
                document.getElementById('loader').classList.add('d-none');
            })
            .catch(error => {
                alert('Error loading news.');
                console.error(error);
                document.getElementById('loader').classList.add('d-none');
            });
    }

    document.getElementById('loadMoreBtn').addEventListener('click', function() {
        currentPage++;
        loadNews(currentPage);
    });

    // Load first page on start
    loadNews(currentPage);
</script>

<?= $this->endSection() ?>