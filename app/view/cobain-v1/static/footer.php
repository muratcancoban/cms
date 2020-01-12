<div class="container">
    <div class="row">
        <div class="col-md-12">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <img class="mb-2" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt=""
                             width="24" height="24">
                        <small class="d-block mb-3 text-muted">© 2019-2020</small>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Daha Neler?</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="http://cobainsoft.xyz/">CobainSoft</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md pr-5">
                        <h5>Hakkımda</h5>
                        <p class="small">
                            <?=setting('about')?>
                        </p>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Sosyal Medya</h5>
                        <ul class="list-unstyled text-small">
                            <?php foreach (menu(2) as $key => $menu): //2. menü geliyor?>
                            <li>
                                <a class="text-muted" href="<?=$menu['url']?>">
                                    <?=htmlspecialchars_decode($menu['title'])//böylelikle uygulama amblemlerimiz ile titlemiz gelmiş oldu?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

</body>
</html>