<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Sayfa Ekle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

        <form action="" method="post" class="form label">
            <div >
                <div >
                    <ul>
                        <li>
                            <label>Sayfa Başlığı</label>
                            <div class="form-content">
                                <input type="text" name="page_title" value="<?= post('page_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Sayfa İçeriği</label>
                            <div class="form-content">
                                <textarea name="page_content" class="ckeditor" cols="30" rows="10"><?=post('page_content')?></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <div >
                    <ul>
                        <li>
                            <label>SEO Url</label>
                            <div class="form-content">
                                <input type="text" name="page_url" value="<?=post('page_url')?>">
                                <p>Eğer boş bırakırsanız otomatik olarak sayfa adını baz alır.</p>
                            </div>
                        </li>
                        <li>
                            <label>SEO Title</label>
                            <div class="form-content">
                                <input type="text" name="page_seo[title]">
                            </div>
                        </li>
                        <li>
                            <label>SEO Description</label>
                            <div class="form-content">
                                <textarea name="page_seo[description]" cols="30" rows="5"></textarea>
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