<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1>All Articles</h1>

<?php foreach ($articles as $article): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?= esc($article['title']) ?></h5>
            <p class="card-text"><?= esc(substr($article['content'], 0, 150)) ?>...</p>
            <a href="<?= site_url('articles/view/' . $article['id']) ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>
