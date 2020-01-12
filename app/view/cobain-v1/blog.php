<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1>BLOG</h1>
        <div class="breadcrumb-custom">
            <a href="#">Anasayfa</a> /
            <a href="#" class="active">Blog</a>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Son Konular</h4>

            <?php if ($query): ?>

                <?php foreach ($query as $row): ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= $row['category_name'] ?>
                            <div class="date">
                                <?= timeConvert($row['post_date']) ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['post_title'] ?></h5>
                            <div class="card-text">
                                <?= htmlspecialchars_decode($row['post_short_content']) ?>
                            </div>
                            <a href="<?= site_url('blog/' . $row['post_url']) ?>" class="btn btn-dark">Görüntüle</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($totalRecord > $pageLimit): //konular sayfa limitinden fazlaysa sayfa numaraları gelecek?>
                    <div class="pagination-container text-center mb-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link"
                                       href="<?= site_url('blog?' . $pageParam . '=' . $db->prevPage()) ?>"
                                       aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Geri</span>
                                    </a>
                                </li>
                                <?= $db->showPagination(site_url('blog?' . $pageParam . '=[page]'), 'active', true) ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="<?= site_url('blog?' . $pageParam . '=' . $db->nextPage()) ?>"
                                       aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">İleri</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>

            <?php else: //blog da yazı yoksa?>
                <div class="alert alert-warning">
                    Blog için henüz hiç yazı eklenmedi, lütfen daha sonra kontrol edin!
                </div>
            <?php endif; ?>

        </div>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Kategoriler
            </h4>
            <ul class="list-group mb-4">
                <?php foreach (Blog::Categories() as $category): //blog sınıfı içerisindeki kategorileri döndürüyoruz ?>
                    <li class="list-group-item">
                        <a href="<?= site_url('blog/kategori/' . $category['category_url']) ?>" style="color: #333;"
                           class="d-flex justify-content-between align-items-center">
                            <?= $category['category_name'] ?>
                            <span class="badge badge-dark badge-pill"><?=$category['total'] //sayısını gösterecek blog classından alıyoruz?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Etiketler
            </h4>
            <a href="#" class="badge badge-light badge-pill">html5</a>
            <a href="#" class="badge badge-light badge-pill">php</a>
            <a href="#" class="badge badge-light badge-pill">css</a>
            <a href="#" class="badge badge-light badge-pill">jquery</a>
            <a href="#" class="badge badge-light badge-pill">unity</a>
            <a href="#" class="badge badge-light badge-pill">php array</a>
            <a href="#" class="badge badge-light badge-pill">muratcan</a>
            <a href="#" class="badge badge-light badge-pill">emyo</a>
            <a href="#" class="badge badge-light badge-pill">cobain</a>
        </div>
    </div>
</div>

<?php require view('static/footer') ?>
