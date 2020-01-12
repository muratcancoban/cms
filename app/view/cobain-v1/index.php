<?php require view('static/header') //static altındaki heade.php çağırıyoruz?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?=setting('welcome_title')?></h1>
        <p class="lead text-muted">
            <?=setting('welcome_text')?>
        </p>
        <p>
            <a href="/cms/blog" class="btn btn-primary my-2">Blog'a Gözat</a>
            <a href="/cms/iletisim" class="btn btn-secondary my-2">İletişime Geç</a>
        </p>
    </div>
</section>
<div class="container">
    <div class="row pb-2">
        <div class="col-md-12">
            <h4 class="pb-3">Neler yapıyorum?</h4>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CobainSoft</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Ceo Muratcan Çoban</h6>
                    <p class="card-text">Daima İleriyi Görerek Hareket Ediyoruz.</p>
                    <a href="http://cobainsoft.xyz/" class="btn btn-sm btn-danger" target="_blank">Referanslara Gözat <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require view('static/footer')//footer.php çağırıyoruz?>
