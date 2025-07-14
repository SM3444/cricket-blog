<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1 class="mb-4">Latest Cricket News</h1>

<?php if (empty($articles)): ?>
    <div class="alert alert-warning">No news available at the moment.</div>
<?php else: ?>
    <?php foreach ($articles as $news): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= esc($news['title']) ?></h5>
                <?php if ($news['image']): ?>
                    <img src="<?= esc($news['image']) ?>" class="img-fluid mb-2" style="max-height: 300px;" />
                <?php endif; ?>
                <p class="card-text"><?= esc($news['description']) ?></p>
                <a href="<?= esc($news['url']) ?>" target="_blank" class="btn btn-primary">Read More</a>
                <p class="text-muted mt-2"><small>Published at: <?= date('d M Y, h:i A', strtotime($news['published_at'])) ?></small></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages && $i <= 10; $i++): ?>
                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                    <a class="page-link" href="<?= site_url('?page=' . $i) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>

<?= $this->endSection() ?>