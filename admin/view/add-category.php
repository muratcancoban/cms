<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Kategori Ekle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" method="post" class="form label">
            <div>
                <div>
                    <ul>
                        <li>
                            <label>Kategori Adı</label>
                            <div class="form-content">
                                <input type="text" name="category_name" value="<?= post('category_name') ?>">
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>
                            <label>SEO Url</label>
                            <div class="form-content">
                                <input type="text" name="category_url" value="<?=post('category_url')?>">
                                <p>Eğer boş bırakırsanız otomatik olarak kategori adını baz alır.</p>
                            </div>
                        </li>
                        <li>
                            <label>SEO Title</label>
                            <div class="form-content">
                                <input type="text" name="category_seo[title]">
                            </div>
                        </li>
                        <li>
                            <label>SEO Description</label>
                            <div class="form-content">
                                <textarea name="category_seo[description]" cols="30" rows="5"></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul>
                    <li class="submit">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit">Gönder</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>

<?php require admin_view('static/footer') ?>